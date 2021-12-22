<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Register view
     */
    public function registerView() {
        return view('register');
    }

    /**
     * Register view
     */
    public function loginView() {
        return view('login');
    }

    /**
     * Register view
     */
    public function indexView() {
        return view('login');
    }

}
