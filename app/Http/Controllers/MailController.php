<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\BlokedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Mews\Purifier\Facades\Purifier;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        Log::info('sendMail() вызван', $request->all());
        $email = Purifier::clean($request->input('email'));
        if (BlokedMail::where('email', $email)->first()) {
            return view('contact-me', ['bloked' => true]);
        }
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
