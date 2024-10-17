<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('admin')
            ],
            [
                'name'=>'user',
                'email'=>'user@gmail.com',
                'role'=>'user',
                'password'=>bcrypt('user')
            ],

            ];

            foreach($user as $key => $val)
            {
                User::create($val);
            }
    }
}
