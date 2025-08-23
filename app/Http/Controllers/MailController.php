<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Captcha;
use App\Reposotories\Blocked\BlockedMailRepository;
use App\Services\BlockedMailService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Mews\Purifier\Facades\Purifier;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $mailRepository = new BlockedMailRepository();
        $blockedMailService = new BlockedMailService($mailRepository);
        $email = Purifier::clean($request->input('email'), ['HTML.Allowed' => '']);
        $captchaInput = Purifier::clean($request->input('captcha'), ['HTML.Allowed' => '']);
        $captchaId = $request->input('captchaID');
        $catchaRealText = Captcha::where('id', $captchaId)->value('text');
        $personalData = $request->boolean('personalData');
        logger('INPUT: ' . $captchaInput);
        logger('REAL: ' . $catchaRealText);
        if (!$personalData) {
            $captches = Captcha::all();
            if (count($captches) != 0) {
                $randCaptcha = Arr::random($captches->toArray());
            } else {
                $randCaptcha = null;
            }

            return view('contact-me', ['blocked' => false, 'captchaBlock' => false, 'personalData' => false, 'captcha' => $randCaptcha]);
        }
        if ($captchaInput !== $catchaRealText) {
            $captches = Captcha::all();
            if (count($captches) != 0) {
                $randCaptcha = Arr::random($captches->toArray());
            } else {
                $randCaptcha = null;
            }

            return view('contact-me', ['blocked' => false, 'captchaBlock' => true, 'personalData' => true, 'captcha' => $randCaptcha]);
        }
        if ($blockedMailService->isBlocked($email)) {
            $captches = Captcha::all();
            if (count($captches) != 0) {
                $randCaptcha = Arr::random($captches->toArray());
            } else {
                $randCaptcha = null;
            }

            return view('contact-me', ['blocked' => true, 'captchaBlock' => false, 'personalData' => true, 'captcha' => $randCaptcha]);
        }
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
            'personalData' => 'accepted'
        ]);

        Mail::to('salispiligrim@yandex.ru')
            ->send(new ContactMail($data));

        return redirect('/');
    }
}
