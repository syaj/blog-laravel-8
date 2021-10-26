<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPermisosRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('permisos_id');
            $table->foreign('permisos_id', 'fk_permisorol_permisos')->on('permisos')->references('id')->onUpdate('restrict')->onDelete('restrict');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id', 'fk_permisorol_roles')->on('roles')->references('id')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos_roles');
    }
}
