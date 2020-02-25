<?php

namespace App\Http\Controllers\User;

use App\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function update(Request $request){



        $request->validate([
           'company'=>'required',
            'phone' => 'required',
            'address1' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'zip' => 'required'
        ]);

        $invoice_exist = Invoice::where('user_id',Auth::id())->get();
        if (count($invoice_exist)){
            foreach ($invoice_exist as $invoice);
            $invoice = Invoice::find($invoice->id);
            $request->session()->flash('invoice_status','Invoice updated successfully');
        }else{
            $invoice = new Invoice();
            $request->session()->flash('invoice_status','Invoice created successfully');
        }
        $invoice->user_id = Auth::id();
        $invoice->company = $request->company;
        $invoice->phone = $request->phone;
        $invoice->address1 = $request->address1;
        $invoice->address2 = $request->address2;
        $invoice->zip = $request->zip;
        $invoice->city = $request->city;
        $invoice->country = $request->country;
        $invoice->save();
        return redirect()->route('user.account.index');



    }
}
