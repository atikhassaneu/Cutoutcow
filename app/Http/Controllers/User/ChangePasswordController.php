<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index(){
        return view('user.change_password.index');
    }
    public function update(Request $request){


        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $admin = User::find(Auth::id());

        if (Hash::check($request->old_password,$admin->password)){
            $admin->password = Hash::make($request->password);
            $admin->save();
            $request->session()->flash('error','Password Changed successfully');
            return redirect()->route('user.change-password.index');
        }else{
            $request->session()->flash('error','Old password does not match');
            return redirect()->route('user.change-password.index');
        }
    }
}
