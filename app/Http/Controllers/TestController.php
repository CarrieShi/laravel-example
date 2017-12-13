<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\OrderShipped;
use Pusher\Pusher;
use App\user;
use App\Notifications\InvoicePaid;

class TestController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        $user->notify(new InvoicePaid());
    }

    public function email()
    {
        Mail::to('shichunli@hikvision.com.cn')->send(new OrderShipped());
    }

    public function pusher()
    {
        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );
        $pusher = new Pusher(
            '01fa5acbe53a449113ca',
            '1d0761ed90838eb7a079',
            '438919',
            $options
        );

        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);

        return view('test/index');
    }
}
