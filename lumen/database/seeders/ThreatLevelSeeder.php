<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThreatLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threat_levels')->insert([
            [
                'title' => 'God'
            ],
            [
                'title' => 'Dragon'
            ],
            [
                'title' => 'Tiger'
            ],
            [
                'title' => 'Wolf'
            ]
        ]);
    }
}
