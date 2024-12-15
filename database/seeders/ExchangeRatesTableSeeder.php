<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExchangeRatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('exchange_rates')->delete();
        
        \DB::table('exchange_rates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'usd' => 1,
                'khr' => 4000.0,
                'is_current' => 0,
                'created_at' => '2024-12-15 03:02:40',
                'updated_at' => '2024-12-15 03:02:46',
            ),
            1 => 
            array (
                'id' => 2,
                'usd' => 1,
                'khr' => 4100.0,
                'is_current' => 1,
                'created_at' => '2024-12-15 03:02:46',
                'updated_at' => '2024-12-15 03:02:46',
            ),
        ));
        
        
    }
}