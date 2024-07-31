<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
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

        Schema::table('role_permission', function (Blueprint $table) {
            if (!Schema::hasColumn('role_permission', 'role_id')) {
                $table->unsignedBigInteger('role_id');
            }
            $table->foreign('role_id')->references('id')->on('role');
            
            if (!Schema::hasColumn('role_permission', 'permission_id')) {
                $table->unsignedBigInteger('permission_id');
            }
            $table->foreign('permission_id')->references('id')->on('permission');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tables', function (Blueprint $table) {
            //
        });
    }
};
