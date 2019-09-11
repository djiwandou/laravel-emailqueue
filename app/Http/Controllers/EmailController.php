<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    //
    public function sendEmail()
    {
        SendEmailJob::dispatch()->onQueue('emails');
        echo 'email3 terkirim pakai job-queue baru';
    }
}
