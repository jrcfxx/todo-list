<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        $timestamp = Carbon::now();

        DB::table('permission')->insert([
            [
                'id' => 1,
                'name' => 'Manage users',
                'description' => 'Create, edit and exclude users',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'id' => 2,
                'name' => 'Manage tasks',
                'description' => 'Create, edit and exclude tasks',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'id' => 3,
                'name' => 'View tasks',
                'description' => 'Visualize and mark tasks as done',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ]);
    }
}
