<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderMail;
use Auth;
use Mail;

class MailController extends Controller
{
    public function formUser(){
        
        return view('pages.infoUser');
    }

    public function sendMail(Request $request){
        $data = [
            'name' => $request->name,
        ];
        Mail::to($request->email)->send(new OrderMail($data) );
        return "Email has been send";
    }
}
