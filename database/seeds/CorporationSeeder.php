<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class CorporationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('CORPORATION')->insert([
            [
                'ID_CORPORATION' => 1,
                'CORPORATION_NAME' => 'PT PUNINAR JAYA',
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ],
            [
                'ID_CORPORATION' => 2,
                'CORPORATION_NAME' => 'PT PUNINAR INFINITE RAYA',
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ]
        ]);
    }
}
