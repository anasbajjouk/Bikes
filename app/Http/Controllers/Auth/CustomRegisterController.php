<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomRegisterController extends Controller
{

    use RegistersUsers;
    
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return redirect('/home');
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token' => str_random(45),
        ]);

        $user->sendVerificationEmail();

        return $user;
    }

    public function verifyEmailFirst(){

        return view('email.verifyEmailFirst');
    }

}
