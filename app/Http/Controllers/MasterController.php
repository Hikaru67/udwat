<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

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
        $data['books'] = Book::with('category')->paginate(10);

        return view('master.books.index', compact('data'));
    }

    /**
     * Role manage view
     */
    public function roleManView() {
        return view('master.roleManage');
    }
}
