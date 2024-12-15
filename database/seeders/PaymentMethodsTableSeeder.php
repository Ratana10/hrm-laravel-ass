<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_methods')->delete();
        
        \DB::table('payment_methods')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'ABA',
                'currency' => 'USD',
                'is_cash' => 0,
                'photo' => 'payment_method/yPSqQbRKhyUasgrx1KKRCJdGUDjR2umuSlV0rkBb.png',
                'created_at' => '2024-12-15 03:22:34',
                'updated_at' => '2024-12-15 03:22:34',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'ACLEDA',
                'currency' => 'USD',
                'is_cash' => 0,
                'photo' => 'payment_method/UqNvhcO9BAweMZ3tHLYiW9QBaIP70oh2P8GqV0dx.jpg',
                'created_at' => '2024-12-15 03:22:44',
                'updated_at' => '2024-12-15 03:22:44',
            ),
            2 => 
            array (
                'id' => 4,
            'name' => 'Dollar (CASH)',
                'currency' => 'USD',
                'is_cash' => 1,
                'photo' => NULL,
                'created_at' => '2024-12-15 03:22:54',
                'updated_at' => '2024-12-15 03:22:54',
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'ប្រាក់រៀល',
                'currency' => 'USD',
                'is_cash' => 1,
                'photo' => NULL,
                'created_at' => '2024-12-15 03:32:28',
                'updated_at' => '2024-12-15 03:37:14',
            ),
        ));
        
        
    }
}