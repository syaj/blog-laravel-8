<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblMenusRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('menus_id');
            $table->foreign('menus_id', 'fk_menusroles_menus')->on('menus')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id', 'fk_menusroles_roles')->on('roles')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus_roles');
    }
}
