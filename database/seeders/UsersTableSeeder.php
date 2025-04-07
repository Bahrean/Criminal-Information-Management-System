<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name' => 'admin',
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
            
                'department' => '',
                'role' => 'admin',
                'status' => 'active',
            ],

        
            [
                'name' => 'investigation_leader',
                'username' => 'investigation_leader',
                'email' => 'invLeader@gmail.com',
                'password' => Hash::make('111'),
        

                'department' => '',
                'role' => 'investigation_leader',
                'status' => 'active',
            ],

    
            [
                'name' => 'investigator',
                'username' => 'investigator',
                'email' => 'investigator@gmail.com',
                'password' => Hash::make('111'),
            

                'department' => '',
                'role' => 'investigator',
                'status' => 'active',
            ],

        
            [
                'name' => 'police',
                'username' => 'police',
                'email' => 'police@gmail.com',
                'password' => Hash::make('111'),
            
                'department' => '',
                'role' => 'police',
                'status' => 'active',
            ],

            
            [
                'name' => 'register_office',
                'username' => 'register_office',
                'email' => 'register_office@gmail.com',
                'password' => Hash::make('111'),
            
                'department' => '',
                'role' => 'register_office',
                'status' => 'active',
            ],
        ]);

        //
    }
}
