<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Auth;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $user;
    public function __construct(User $user)
    {
        $this->user =$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Auth::logout();
        $encryptedEmail = Crypt::encrypt($this->user->email);
        $link = route('signup.verify',['token' => $encryptedEmail]);
        $namaemail = $this->user->name;
        return $this->subject('Verfikasi Emai')
            ->with('link', $link)
            ->view('email.signup',compact('namaemail'));
        // return $this->view('view.name');
    }
}
