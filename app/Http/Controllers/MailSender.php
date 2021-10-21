<?php

namespace App\Http\Controllers;

use App\Mail\MailToSelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class MailSender extends Controller
{
    public function index(Request $request)
    {
        Mail::to($request->user())
            ->send(new MailToSelf($request->user()->name));

        $users = DB::table('users')->get();

        return view('dashboard', ['users' => $users]);
    }
}
