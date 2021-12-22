<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Register view
     */
    public function registerView() {
        return view('pages.customer.login');
    }
}
