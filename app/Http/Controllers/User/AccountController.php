<?php

namespace App\Http\Controllers\User;


use App\Invoice;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        $invoices = Invoice::where('user_id',Auth::id())->get();
        foreach ($invoices as $invoice);
        $invoice = Invoice::find($invoice->id);

        return view('user.account.index',compact('user','invoice'));
    }

    public function update(Request $request){
        $user = User::find(Auth::id());

        $request->validate([
           'acc_name'=> 'required',
           'acc_company'  => 'required',
           'acc_phone'    => 'required'
        ]);

        $user->full_name = $request->acc_name;
        $user->company    = $request->acc_company;
        $user->phone     = $request->acc_phone;

        $user->save();
        $request->session()->flash('acc_status','Account updated successfully');
        return redirect()->route('user.account.index');









    }
}
