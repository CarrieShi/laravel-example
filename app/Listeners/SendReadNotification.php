<?php

namespace App\Listeners;

use App\Events\ArticlePublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReadNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ArticlePublished  $event
     * @return void
     */
    public function handle(ArticlePublished $event)
    {
        $article = json_encode($event->article);
        file_put_contents('log.txt', 
            date('Y-m-d H:i:s') . " Hiiiiiii~~~~~~~~~ I shared something, come and read!!!!!!!!!" . $article . " \n\n",
            FILE_APPEND) ;
    }
}
