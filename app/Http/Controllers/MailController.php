<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Reposotories\Blocked\BlockedMailRepository;
use App\Services\BlockedMailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mews\Purifier\Facades\Purifier;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $mailRepository = new BlockedMailRepository();
        $blockedMailService = new BlockedMailService($mailRepository);
        $email = Purifier::clean($request->input('email'), ['HTML.Allowed' => '']);
        if ($blockedMailService->isBlocked($email)) {
            return view('contact-me', ['blocked' => true]);
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
