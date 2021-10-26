<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPostTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('posts_id');
            $table->foreign('posts_id', 'fk_posttags_post')->on('posts')->references('id')->onUpdate('restrict')->onDelete('cascade');
            $table->unsignedBigInteger('tags_id');
            $table->foreign('tags_id', 'fk_posttags_tags')->on('tags')->references('id')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('post_tags');
    }
}
