<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\VerificationCode;

class MailController extends Controller
{
    public function sendMail(Request $request) {
        $email = $request->input('email');
        $token = $request->input('token');

        Mail::to($email)->send(new VerificationCode($email, $token));
    }
}
