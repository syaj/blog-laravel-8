<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('usuarios_id', 'fk_comentarios_usuarios')->on('usuarios')->references('id')->onUpdate('restrict')->onDelete('cascade');
            $table->unsignedBigInteger('posts_id');
            $table->foreign('posts_id', 'fk_comentarios_posts')->on('posts')->references('id')->onUpdate('restrict')->onDelete('cascade');
            $table->unsignedBigInteger('comentarios_id')->nullable();
            $table->foreign('comentarios_id', 'fk_comentarios_comentarios')->on('comentarios')->references('id')->onUpdate('restrict')->onDelete('cascade');
            $table->text('contenido');
            $table->boolean('estado')->default(0);
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
        Schema::dropIfExists('comentarios');
    }
}
