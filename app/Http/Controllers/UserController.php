<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Register an account
     *
     * @param Request $request
     */
    public function register(Request $request) {
        $request->validate([
            'username' => 'required|min:3|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $data = $request->only(['username', 'email', 'password', 'phone', 'address']);
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('home.login');
    }

    /**
     * Login
     *
     * @param Request $request
     */
    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $data = $request->only(['username', 'password']);
        $user = User::where('username', $data['username'])->first();
        if (!isset($user) || !Hash::check($data['password'], $user->password)) {
            return back()->withErrors(['wrong_password' => 'Username or password is incorrect'])->withInput();
        }

        session([
            'is_login' => true,
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                // 'roles' => $user->roles,
                'username' => $user->username,
            ],
        ]);

        return redirect('/');
    }
}
