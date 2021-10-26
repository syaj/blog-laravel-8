<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPostCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('posts_id');
            $table->foreign('posts_id', 'fk_postcategorias_post')->on('posts')->references('id')->onUpdate('restrict')->onDelete('cascade');
            $table->unsignedBigInteger('categorias_id');
            $table->foreign('categorias_id', 'fk_postcategorias_categorias')->on('categorias')->references('id')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('post_categorias');
    }
}
