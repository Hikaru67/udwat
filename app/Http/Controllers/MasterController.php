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
}
