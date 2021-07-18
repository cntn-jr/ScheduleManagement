<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TestUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'test2',
            'email' => 'test2@example.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'test3',
            'email' => 'test3@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
