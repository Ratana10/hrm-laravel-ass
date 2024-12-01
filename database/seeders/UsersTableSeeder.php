<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$/fRDNihVfRSP6GsXImHbA.LcTrEH8c3r5NdhtVaTdDzJDy.seXlFy', //12345678
                'remember_token' => NULL,
                'created_at' => '2024-11-30 02:56:55',
                'updated_at' => '2024-11-30 02:56:55',
            ),
        ));
        
        
    }
}
