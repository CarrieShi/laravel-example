<?php

namespace App\Listeners;

class UserEventSubscriber
{
    /**
     * 处理用户登录事件。
     */
    public function onUserLogin($event) 
    {
        $user = json_encode($event->user);
        file_put_contents('log.txt', 
            date('Y-m-d H:i:s') . " Yo, I'm comming!!!!!" . $user  . " \n\n",
            FILE_APPEND) ;
    }

    /**
     * 处理用户注销事件。
     */
    public function onUserLogout($event) 
    {
        $user = json_encode($event->user);
        file_put_contents('log.txt', 
            date('Y-m-d H:i:s') . " Bye, I'm leaving!!!" . $user  . " \n\n",
            FILE_APPEND) ;
    }

    /**
     * 为订阅者注册监听器。
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }

}