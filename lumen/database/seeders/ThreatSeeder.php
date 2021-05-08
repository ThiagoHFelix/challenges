<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThreatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threat')->insert([
            [
                'monster_id' => 1,
                'level_id'   => 1

            ],
            [
                'monster_id' => 3,
                'level_id'   => 1
            ],
            [
                'monster_id' => 2,
                'level_id'   => 4
            ],
            [
                'monster_id' => 3,
                'level_id'   => 2
            ]
        ]);
    }
}
