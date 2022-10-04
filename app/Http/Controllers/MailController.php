<?php

namespace App\Http\Controllers;

use App\Mail\DokkanMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($email)
    {
        $mailData = [
            'title' => 'Mail from Dokkan ElMansoura',
            'body' => 'The Order is Checked and we will Contact you Soon'
        ];
        Mail::to($email)->send(new DokkanMail($mailData));
        // dd("Email is sent successfully.");
    }
}
