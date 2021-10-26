<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblUsuariosRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('usuarios_id', 'fk_usuariosroles_usuarios')->on('usuarios')->references('id')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id', 'fk_usuariosroles_roles')->on('roles')->references('id')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_roles');
    }
}
