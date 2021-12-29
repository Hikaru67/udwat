<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Cache;

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
            'password' => 'required|min:6|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,40}$/i',
        ]);
        $data = $request->only(['username', 'email', 'password', 'phone', 'address']);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        dispatch(new SendEmail('mail.activeAccount', $user, $data['email'], 'Active account'));

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
            return back()->withErrors(['fail' => 'Username or password is incorrect'])->withInput();
        }
        if (!auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            abort(401, 'Email/Password do not match');
        }
        session([
            'is_login' => true,
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'roles' => $user->roles,
                'username' => $user->username,
            ],
        ]);

        return redirect('/');
    }

    /**
     * Login master
     *
     * @param Request $request
     */
    public function loginMaster(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = $request->only(['username', 'password']);
        $user = User::where('username', $data['username'])->first();
        if (!isset($user) || !Hash::check($data['password'], $user->password)) {
            return back()->withErrors(['fail' => 'Username or password is incorrect'])->withInput();
        }
        if (!auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            abort(401, 'Email/Password do not match');
        }
        session([
            'is_login' => true,
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'roles' => $user->roles,
                'username' => $user->username,
            ],
        ]);

        return redirect('/');
    }

    public function logout() {
        session()->flush();

        return redirect('/login');
    }

    /**
     * Recover password
     *
     * @param Request $request
     */
    public function recoverPassword(Request $request) {
        $request->validate([
            'email' => 'required'
        ]);
        $data = $request->only(['email']);
        $user = User::where('email', $data['email'])->first();
        if (!isset($user)) {
            return back()->withErrors(['fail' => 'Email is not used for any account'])->withInput();
        }
        $code = $user->username . time() . $user->email . rand(0,time());
        $data['code'] = md5($code);
        Cache::put('recover_code_' . $user->username, $data['code'], now()->addMinutes(30));

        dispatch(new SendEmail('mail.recoverPassword', $data, $data['email'], 'Recover password'));
        return back()->withSuccess('An recover email is sent to your email')->withInput();
    }

    /**
     * Renew Password
     *
     * @param Request $request
     */
    public function renewPassword(Request $request) {
        $request->validate([
            'code' => 'required',
            'email' => 'required',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,40}$/i|confirmed',
        ]);
        $data = $request->only(['code', 'email', 'password']);

        $user = User::where('email', $data['email'])->first();
        if (!isset($user)) {
            return back()->withErrors(['fail' => 'Oops! Something was wrong'])->withInput();
        }
        $code = Cache::get('recover_code_' . $user->username);
        if (!isset($code) || $code != $data['code']) {
            return back()->withErrors(['fail' => 'Oops! Something was wrong'])->withInput();
        }

        $data['password'] = bcrypt($data['password']);
        $user->password = $data['password'];
        $user->update();
        Cache::forget('recover_code_' . $user->username);

        // dispatch(new SendEmail('mail.changePassword', $user, $data['email'], 'Your password was changed'));

        return redirect()->route('home.login');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|regex:/|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,40}$/i/i|confirmed',
        ]);

        $data = $request->only(['old_password', 'new_password']);
        $user = session()->get('user');
        $user = User::where('email', $user['email'])->first();
        if (!isset($user) || !Hash::check($data['old_password'], $user->password)) {
            return back()->withErrors(['fail' => 'Old password was wrong'])->withInput();
        }

        $data['new_password'] = bcrypt($data['new_password']);
        $user->password = $data['new_password'];
        $user->update();

        dispatch(new SendEmail('mail.changedPassword', $user, $user->email, 'Your password was changed'));

        return redirect()->route('home');
    }
}
