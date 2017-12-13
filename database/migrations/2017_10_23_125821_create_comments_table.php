<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname')->default('')->comment('昵称');
            $table->string('email')->default('')->comment('邮箱');
            $table->string('website')->default('')->comment('网站');
            $table->text('content')->nullable()->comment('内容');
            $table->integer('article_id')->default(0)->comment('Article Id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
