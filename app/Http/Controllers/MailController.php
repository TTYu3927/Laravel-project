<?php

namespace App\Http\Controllers;

use App\Jobs\CustomerJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail; // Ensure you have the correct namespace for your Mailable

class MailController extends Controller
{
    public function sendMail(){
        // Mail::to('formlaccgg@gmail.com')->send(new WelcomeEmail());
        // dd('mail sent');


        dispatch(new CustomerJob());
        dd('Email has been sent successfully!');
    }
}
