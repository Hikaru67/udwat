<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        return view('login2');
    }

    /**
     * Register view
     *
     * @param Request $request
     */
    public function indexView(Request $request) {
        $data['books'] = Book::with('category')->paginate(10);
        return view('index', compact('data'));
    }

    /**
     * Forgot password view
     */
    public function forgotPasswordView() {
        return view('forgotPassword');
    }

    /**
     * Renew password view
     */
    public function renewPasswordView() {
        return view('renewPassword');
    }

    /**
     * Change password view
     */
    public function changePasswordView() {
        return view('changePassword');
    }

}
