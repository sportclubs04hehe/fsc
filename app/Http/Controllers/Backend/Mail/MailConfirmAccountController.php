<?php

namespace App\Http\Controllers\Backend\Mail;

use App\Http\Controllers\Controller;
use App\Mail\Mail;
use Illuminate\Http\Request;

class MailConfirmAccountController extends Controller
{
    //
    function sendMail(){
        Mail::to('vegakinvietnam@gmail.com')->send(new Mail());
    }
}
