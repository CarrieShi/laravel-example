<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Jobs\SendReminderEmail;

use App\Comment;

class ReminderEmailController extends Controller
{
    public function store(Request $request)
    {
        $comment = Comment::find(1);
        SendReminderEmail::dispatch($comment)
            ->delay(Carbon::now()->addMinutes(10));
    }
}
