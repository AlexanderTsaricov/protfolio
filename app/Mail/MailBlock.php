<?php

namespace App\Mail;

use App\Models\BlockedMail;

class MailBlock implements Blokerator
{
    private $blockedMails = [];

    public function __construct()
    {
        $blockedMailsModels = BlockedMail::all();
        foreach ($blockedMailsModels as $blokedMailModel) {
            $this->blockedMails[] = $blokedMailModel->email;
        }
    }

    public function block($mail)
    {
        if (in_array($mail, $this->blockedMails)) {
            return false;
        } else {
            $newBlokedMail = new BlockedMail();
            $newBlokedMail->email = $mail;
            $newBlokedMail->save();
            $this->blockedMails[] = $newBlokedMail->email;
            return true;
        }
    }


    public function unblock($mail)
    {
        if (in_array($mail, $this->blockedMails)) {
            for ($i = 0; $i < count($this->blockedMails); $i++) {
                if ($mail == $this->blockedMails[$i]) {
                    BlockedMail::where('email', $mail)->delete();
                    return true;
                }
            }

            return false;
        }
    }
}
