<?php

namespace App;

use App\Notification;
use App\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image','birthDate','gender','address','phone',
        'role','subscriber','stripe_id','card_brand','cart_last_four','trial_ends_at',
        'last_login_at','last_login_ip','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'last_login_at', 'last_login_ip','birthDate'
    ];


    public function isAdmin(){
        return (($this->role == "admin") OR ( $this->role == "super_admin"));
    }

    public function isSuperAdmin(){
        return  $this->role == "super_admin";
    }

    public function verified(){

        return $this->token === null; 

    }

    public function sendVerificationEmail(){

        return $this->notify(new VerifyEmail($this));
        // This will allow you to send notifications to multiple notifiables at the same time:
        //Notification::send(User::all(), new VerifyEmail($this));

    }


    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

}
