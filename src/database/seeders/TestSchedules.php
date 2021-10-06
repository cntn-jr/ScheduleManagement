<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TestSchedules extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('schedules')->insert([
            'title' => 'test title 1',
            'content' => 'test content 1',
            'scheduledDate' => '2021-9-1',
            'user_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('schedules')->insert([
            'title' => 'test title 2',
            'content' => 'test content 2',
            'scheduledDate' => '2022-5-8',
            'user_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('schedules')->insert([
            'title' => 'test title 3',
            'content' => 'test content 3',
            'scheduledDate' => '2020-12-3',
            'user_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('schedules')->insert([
            'title' => 'test title 4',
            'content' => 'test content 4',
            'scheduledDate' => '2021-8-4',
            'user_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('schedules')->insert([
            'title' => 'test title 5',
            'content' => 'test content 5',
            'scheduledDate' => '2020-8-7',
            'user_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('schedules')->insert([
            'title' => 'test title 6',
            'content' => 'test content 6',
            'scheduledDate' => '2022-1-1',
            'user_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
