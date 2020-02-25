<?php

namespace App\Http\Controllers\User;

use App\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function overview(){
        $completed_orders = Orders::where('status',1)->Where('user_id',Auth::id())->get();
        $incompleted_orders = Orders::where('status',0)->Where('user_id',Auth::id())->get();
        return view('user.order.overview.index',compact('completed_orders','incompleted_orders'));
    }

    public function newOrder(){
        return view('user.order.new_order.index');
    }

   public function imageUpload(Request $request){
        $output_type = null;
        $defaultPrice = 1.25;
        $reflectionPrice = .25;
        $watermarkPrice = .25;
        $price = $defaultPrice;

        if($request->watermark == 1){
            $price = $price+$watermarkPrice;
        }
        if($request->reflection == 1){
            $price = $price+$reflectionPrice;
        }



        if($request->watermark == 1 && $request->reflection == 1){
            echo  $output_type = 'JPG, PNG, reflection, watermark';
        }elseif ($request->watermark == 1){
           echo  $output_type = 'JPG, PNG, watermark';
        }elseif ($request->reflection == 1){
            echo $output_type = 'JPG, PNG, reflection';
        }else{
           echo  $output_type = 'JPG, PNG';
        }


        $ip = $_SERVER['REMOTE_ADDR'];
        $ip_array = explode('.',$ip);
        $ip = $ip_array[0]."".$ip_array[1];
        date_default_timezone_set('Asia/dhaka');
        $time = substr(time(),-4);
        $current_time = date('hi');

        $order_id = $current_time." - ".$time."".$ip;
        $path = "upload/incomplete_order/".$order_id;

        if (!file_exists($path)){
            mkdir($path,777,true);
        }

        $files = $request->file('file');
        $total_image = count($files);
        $total_price = $total_image*$price;

        if ($files){
            foreach ($files as $file){
                $file_extension = $file->getClientOriginalExtension();
                $file_name = $file->getClientOriginalName();
                $file_name_array = explode('.',$file_name);
                array_pop($file_name_array);
                $file_name = implode('-',$file_name_array)."-".substr(uniqid(),1, 5).".".$file_extension;
                $file->move($path,$file_name);
            }
        }

        $order = new Orders();
        $order->user_id =  Auth::id();
        $order->order_id = $order_id;
        $order->temp_location = $path;
        $order->price = $total_price;
        $order->output_type = $output_type;
        $order->order_type = 'trial';
        $order->status = 1;
        $order->save();

   }


    public function destroy($id){
        Orders::find($id)->delete();
        return redirect()->back();
    }

}
