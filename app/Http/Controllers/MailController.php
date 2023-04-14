<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MailController extends Controller
{
    public function mailer()
    {
        $users = User::all();

        $subject = "This is Subject";
        $content = "This is Content";
        $emails = [];
        foreach($users as $user)
        {
            $emails[] = [
                'email' => $user->email,
            ];
        }

        foreach($emails as $email)
        {
            $email = $email['email'];
            dispatch(new SendMail($email, $subject, $content));
        }


        return redirect('job');

        dd("Sent!!!");
    }
}
