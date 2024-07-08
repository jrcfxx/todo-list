<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('pivot', 'role_permission');

        Schema::rename('users', 'user');

        Schema::rename('roles', 'role');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('role_permission', 'pivot');
        Schema::rename('user', 'users');
        Schema::rename('role', 'roles');
    }
}
