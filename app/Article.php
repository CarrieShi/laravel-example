<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    //

    /**
     * 获得此博客文章的评论。
     */
    public function hasManyComments()
    {
        return $this->hasMany('App\Comment');
    }
}
