<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Crypt;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/buku';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(array $data)
    {

     // DB::transaction(function () use($data) {
                // save into table
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'level' => '2',
                    'password' => bcrypt($data['password']),
                ]);
                // send email verification
                // Mail::to($user->email)->send(new VerifyEmail($user));
            // });
            // print_r($d);
          // return redirect('login')->with('warning','Cek E-mail anda untuk Verifikasi Akun');
          return redirect()->back();
    }

    public function verify()
    {
        if (empty(request('token'))) {
            // if token is not provided
            return redirect()->route('signup.verify');
        }
        // decrypt token as email
        $decryptedEmail = Crypt::decrypt(request('token'));
        // find user by email
        $user = User::whereEmail($decryptedEmail)->first();
        if ($user->status == 'activated') {
            // user is already active, do something
            return redirect('buku');
        }
        // otherwise change user status to "activated"
        $user->status = 'activated';
        $user->save();
        // autologin
        // Auth::loginUsingId($user->id);
        return redirect('/login')->with('status','Akun anda telah terverifikasi . Silahkan Login ');
    }
}
