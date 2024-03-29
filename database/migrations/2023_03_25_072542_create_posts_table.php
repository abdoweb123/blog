<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{

    /**  Run the migrations **/
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('author');
            $table->text('content');
            $table->string('image');
            $table->date('date');
            $table->softDeletes();
            $table->timestamps();
        });
    }



    /**  Reverse the migrations **/
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
