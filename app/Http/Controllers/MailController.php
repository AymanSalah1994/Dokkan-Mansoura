<?php

namespace App\Http\Controllers;

use App\Mail\DokkanMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];
        Mail::to('ayman.1551.salah@gmail.com')->send(new DokkanMail($mailData));
        // dd("Email is sent successfully.");
    }
}
