<?php

namespace App\Http\Controllers\Admin;

use App\PictureRate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PictureRateController extends Controller
{
    public function index(){
        $rate = PictureRate::find(1);
        return view('admin.picture_rate.index',compact('rate'));
    }

    public function update(Request $request){
        $request->validate([
            'rate' => 'required|numeric|between:0,999.999'
        ]);

        $rate = PictureRate::find(1);
        $rate->rate = $request->rate;
        $rate->save();
        $request->session()->flash('status','Picture rate updated successfully');
        return redirect()->route('admin.picture-rate.index');
    }
}
