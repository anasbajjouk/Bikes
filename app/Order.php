<?php

namespace App;

use App\Mail\OrderShipped;
use App\Notifications\NewOrder;
use App\Widget;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class Order extends Model
{
    protected $fillable=[
    	'total', 'delivered','hash'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function orderItems(){
        return $this->belongsToMany(Product::class)->withPivot('qty','total');
    }

    public function widgetItems(){
        return $this->belongsToMany(Widget::class)->withPivot('qty','total');
    }

    /**
     * Store the Order in the DB 
     * @return [type] [description]
     */
    public static function createOrder()
    {

        $user = Auth::user();
        
        $admins = User::where('role', 'super_admin')
                        ->orWhere('role', 'admin')
                        ->get();

        $order = $user->orders()
                        ->create([
                            'total' => Cart::total(),
                            'delivered' => 0,
                            'hash' => str_random(60)
                        ]);

        $cartItems = Cart::content();


        foreach ($cartItems as $cartItem) {

            if ($cartItem->options->type == 'w') {

                $order->widgetItems()->attach($cartItem->id,[
                    'qty' => $cartItem->qty,
                    'total' => $cartItem->qty * $cartItem->price
                ]);

            }else{

                $order->orderItems()->attach($cartItem->id,[
                    'qty' => $cartItem->qty,
                    'total' => $cartItem->qty * $cartItem->price
                ]);

            }

           
        }

        Mail::to($user)
                ->send( new OrderShipped($order) );

        Notification::send($admins, new NewOrder($order));

        //$user->notify(new NewPost($post));
        

        /*Mail::to($request->user())
            ->cc($moreUsers)
            ->bcc($evenMoreUsers)
            ->send(new OrderShipped($order))
            ->queue(new OrderShipped($order));*/

    }

}
