<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Register view
     */
    public function loginView() {
        return view('master.login');
    }

    /**
     * Dashboard view
     */
    public function indexView() {
        return view('master.index');
    }

    /**
     * User manage view
     */
    public function userManView() {
        return view('master.userManage');
    }

    /**
     * Book manage view
     */
    public function bookManView() {
        return view('master.bookManage');
    }

    /**
     * Role manage view
     */
    public function roleManView() {
        return view('master.roleManage');
    }
}
