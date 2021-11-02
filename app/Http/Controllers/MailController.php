<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request)
    {
        $details = [
            'title' => 'Mail from topsite',
            'body' => 'testtesttesttesttest',
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,

        ];

        Mail::to("mees@topsite.nl")->send(new TestMail($details));
        return redirect('/home')->with('success', 'Email has been send :)');
    }
}
