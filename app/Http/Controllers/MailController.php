<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        Log::info('sendMail() вызван', $request->all());
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Mail::to('salispiligrim@yandex.ru')
            ->send(new ContactMail($data));

        return redirect('/');
    }
}
