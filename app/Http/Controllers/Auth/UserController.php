<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        if (Auth::check() && (Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'Admin')){
            return redirect()->route('admin.dashboard');
        }
        if (Auth::check() && (Auth::user()->user_role == 'user' || Auth::user()->user_role == 'user')){
            return redirect()->route('user.dashboard.index');
        }
        return redirect()->route('login');
    }
}
