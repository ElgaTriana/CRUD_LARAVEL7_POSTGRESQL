<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class Power_unit_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('POWER_UNIT_TYPE')->insert([
            [
                'ID_POWER_UNIT_TYPE' => 1,
                'POWER_UNIT_TYPE_XID' => 'ENGKEL',
                'DESCRIPTION' => 'PRIME_MOVER ENGKEL NON KAROSERI',
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ],
            [
                'ID_POWER_UNIT_TYPE' => 2,
                'POWER_UNIT_TYPE_XID' => 'TRONTON',
                'DESCRIPTION' => 'PRIME_MOVER TRONTON NON KAROSERI',
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ],
            [
                'ID_POWER_UNIT_TYPE' => 3,
                'POWER_UNIT_TYPE_XID' => 'TOWING_CDD',
                'DESCRIPTION' => 'RIGID CDD JENIS KAROSERI TOWING',
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ],
            [
                'ID_POWER_UNIT_TYPE' => 4,
                'POWER_UNIT_TYPE_XID' => 'CAR-CARRIER_ENGKEL',
                'DESCRIPTION' => 'PRIME MOVER ENGKEL JENIS KAROSERI CAR CARRIER',
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ],
            [
                'ID_POWER_UNIT_TYPE' => 5,
                'POWER_UNIT_TYPE_XID' => 'MOTOR-CARRIER_ENGKEL',
                'DESCRIPTION' => 'PRIME MOVER ENGKEL JENIS KAROSERI MOTOR CARRIER',
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ],            
            [
                'ID_POWER_UNIT_TYPE' => 6,
                'POWER_UNIT_TYPE_XID' => 'FLAT-DECK_TRONTON',
                'DESCRIPTION' => 'RIGID TRONTON JENIS KAROSERI FLAT DECK',
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ],            [
                'ID_POWER_UNIT_TYPE' => 7,
                'POWER_UNIT_TYPE_XID' => 'MIXER_TRONTON',
                'DESCRIPTION' => 'RIGID TRONTON JENIS KAROSERI MIXER',
                'INSERT_USER' => 1,
                'INSERT_DATE' => Carbon::parse('2018-12-20'),
                'UPDATE_USER' => 2,
                'UPDATE_DATE' => Carbon::parse('2018-12-21')
            ]
        ]);
    }
}
