<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function sendMail()
    {
        $details =
            [
                'title' => 'It is a test mail',
                'body' => 'Just checking the mail functionality'
             ];

        Mail::to('vadymtsots@gmail.com')->send(new TestMail($details));
        return redirect()->route('success');
    }

}
