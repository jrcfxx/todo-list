<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task', function (Blueprint $table) {
            if (!Schema::hasColumn('task', 'user_id')) {
                $table->unsignedBigInteger('user_id')->after('id');
            }
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('task_change', function (Blueprint $table) {
            if (!Schema::hasColumn('task_change', 'task_id')) {
                $table->unsignedBigInteger('task_id')->after('id');
            }
            $table->foreign('task_id')->references('id')->on('task');
        });

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role_id')) {
                $table->unsignedBigInteger('role_id')->after('id');
            }
            $table->foreign('role_id')->references('id')->on('role');
        });

        Schema::table('pivot', function (Blueprint $table) {
            if (!Schema::hasColumn('pivot', 'role_id')) {
                $table->unsignedBigInteger('role_id');
            }
            $table->foreign('role_id')->references('id')->on('role');
            
            if (!Schema::hasColumn('pivot', 'permission_id')) {
                $table->unsignedBigInteger('permission_id');
            }
            $table->foreign('permission_id')->references('id')->on('permission');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('task_change', function (Blueprint $table) {
            $table->dropForeign(['task_id']);
            $table->dropColumn('task_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });

        Schema::table('pivot', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            
            $table->dropForeign(['permission_id']);
            $table->dropColumn('permission_id');
        });
    }
}
