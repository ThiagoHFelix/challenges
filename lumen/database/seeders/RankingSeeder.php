<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rankings')->insert([
            [
                'title' => 'Ranking S',
                'alias' => 'S'
            ],
            [
                'title' => 'Ranking A',
                'alias' => 'A'
            ],
            [
                'title' => 'Ranking B',
                'alias' => 'B'
            ],
            [
                'title' => 'Ranking C',
                'alias' => 'C'
            ]
        ]);
    }
}
