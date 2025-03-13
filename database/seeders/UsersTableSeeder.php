<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('roles')->delete();

        $adminRoleId = \DB::table('roles')->insertGetId([
            'name' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $hrRoleId = \DB::table('roles')->insertGetId([
            'name' => 'HR',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $employeeRoleId = \DB::table('roles')->insertGetId([
            'name' => 'Employee',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        \DB::table('employees')->delete();
        
     
        $hrId = \DB::table('employees')->insertGetId([
            'name' => 'HR',
            'department' => 'HR Department',
            'position' => 'HR',
            'salary' => 500,
            'work_date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $vathanaId = \DB::table('employees')->insertGetId([
            'name' => 'Sokly',
            'department' => 'IT Department',
            'position' => 'Backend developer',
            'salary' => 500,
            'work_date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \DB::table('users')->delete();
        
     
        \DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role_id' => $adminRoleId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \DB::table('users')->insert([
            'name' => 'HR',
            'email' => 'hr@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role_id' => $hrRoleId,
            'employee_id' => $hrId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \DB::table('users')->insert([
            'name' => 'Sokly',
            'email' => 'sokly@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role_id' => $employeeRoleId,
            'employee_id' => $vathanaId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
