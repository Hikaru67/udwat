<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

use function PHPUnit\Framework\isNull;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = session()->get('master')['role']->roles;
        if (!checkHavingAccess($roles, config('constant.roles')['role']['view'])) {
            return redirect()->route('master.index');
        }
        $data['roles'] = Role::paginate(10);

        return view('master.roles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = session()->get('master')['role']->roles;
        if (!checkHavingAccess($roles, config('constant.roles')['role']['edit'])) {
            return redirect()->route('master.index');
        }
        $rolesList = config('constant.roles');

        return view('master.roles.new', compact('rolesList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $data = $request->only(['name', 'roles']);

        Role::create($data);

        return redirect()->route('master.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return $role;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $roles = session()->get('master')['role']->roles;
        if (!checkHavingAccess($roles, config('constant.roles')['role']['edit'])) {
            return redirect()->route('master.index');
        }
        $rolesList = config('constant.roles');
        return view('master.roles.edit', compact(['role', 'rolesList']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role  role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $roles = session()->get('master')['role']->roles;
        if (!checkHavingAccess($roles, config('constant.roles')['role']['edit'])) {
            return redirect()->route('master.index');
        }
        $data = $request->only(['name', 'roles']);

        foreach ($data as $key => $item) {
            if (isset($item)) {
                $role->$key = $item;
            }
        }

        $role->save();

        return redirect()->route('master.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $roles = session()->get('master')['role']->roles;
        if (!checkHavingAccess($roles, config('constant.roles')['role']['delete'])) {
            return redirect()->route('master.index');
        }
        $role->delete();

        return redirect()->route('master.roles.index');
    }
}
