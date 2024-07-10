<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $timestamp = Carbon::now();

        DB::table('role')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'description' => 'Administrator with full access',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'id' => 2,
                'name' => 'User',
                'description' => 'Regular user with limited access - create his own tasks and administrate them',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'id' => 3,
                'name' => 'Viewer',
                'description' => 'Visualize task lists. Can not create, edit or delete tasks',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ]);
    }
}
