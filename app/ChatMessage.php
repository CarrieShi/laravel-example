<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'chat_messages';
    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = true;

    public $fillable = ['user_id', 'message'];
}
