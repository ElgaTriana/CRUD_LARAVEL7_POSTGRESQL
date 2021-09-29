<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('LOCATION')->insert([
            [
                'ID_LOCATION' => 1,
                'LOCATION_NAME' => 'POOL CILEGON',
                'CITY' => 'CILEGON',
                'PROVINCE' => 'BANTEN',
                'LATITUDE' => -6.002534,
                'LONGITUDE' => 106.011124,
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ],
            [
                'ID_LOCATION' => 2,
                'LOCATION_NAME' => 'SURABAYA POOL',
                'CITY' => 'PANDAAN',
                'PROVINCE' => 'JAWA TIMUR',
                'LATITUDE' => -7.6503,
                'LONGITUDE' => 112.7057,
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ],
            [
                'ID_LOCATION' => 3,
                'LOCATION_NAME' => 'POOL CAKUNG',
                'CITY' => 'CAKUNG',
                'PROVINCE' => 'DKI JAKARTA',
                'LATITUDE' => -6.172035,
                'LONGITUDE' => 106.942108,
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ],
            [
                'ID_LOCATION' => 4,
                'LOCATION_NAME' => 'POOL NAGRAK',
                'CITY' => 'NAGRAK',
                'PROVINCE' => 'DKI JAKARTA',
                'LATITUDE' => -6.116907,
                'LONGITUDE' => 106.942471,
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ],
            [
                'ID_LOCATION' => 5,
                'LOCATION_NAME' => 'POOL MEDAN',
                'CITY' => 'MEDAN',
                'PROVINCE' => 'SUMATRA UTARA',
                'LATITUDE' => 3.590000,
                'LONGITUDE' => 98.67802,
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ]
        ]);
    }
}
