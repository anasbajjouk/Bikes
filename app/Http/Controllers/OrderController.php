<?php

namespace App\Http\Controllers;

use App\Events\OrderNotification;
use App\Mail\OrderShipped;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hash)
    {
        $orders = Order::where('hash', 'like' , $hash)->get();

        foreach ($orders as $order) {
            $numberOfProducts = $order->orderItems->count('product_id');
            $totalPrice = $order->orderItems()
                                ->where('order_id', $order->id)
                                ->sum('total');
        }
        
        
        //dd($numberOfProducts);
        $i = 1; 
        return view('orders.index', compact('orders','i','numberOfProducts','totalPrice'));
    }

    public function orders($type='')
    {   

        if($type == "pending"){

            $orders = Order::where('delivered', 0)->get();

        }elseif ($type == "delivered") {

            $orders = Order::where('delivered', 1)->get();

        }else{

            $orders = Order::all();

        }

         /*{{ $orders->appends(['type' => $type])->links() }}*/
        return view('admin.orders',compact('orders','type','orderStatus'));
    }

    public function toggleOrder(Request $request, $orderId)
    {
        $order = Order::find($orderId);

        $action = $request->input('action');

        if( $request->has('delivered') ){

            $time = Carbon::now()->addMinute(1);

            Mail::to($order->user)->later($time, new OrderShipped($order) );

            $order->delivered = $request->delivered;

            $order->status = "100";

        }else{

            switch ($action) {
                case 'waiting':
                    $order->status = "20";
                    break;

                case 'picked':
                    $order->status = "50";
                    break;

                case 'on_the_way':
                    $order->status = "80";
                    break;
                
                default:
                    $order->status = "20";
                    break;
            }  

            $order->delivered = "0";
        }

        $order->save();

        event(new OrderNotification($order));

        /*$admin = User::where('role', 'admin')
                        ->orWhere('role', 'super_admin');

        $order->admin->notify(new NewOrder($order));*/

        return back();

    }

 
}
