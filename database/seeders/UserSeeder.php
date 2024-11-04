<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'First Admin',
                'username' => 'fstadm595',
                'email' => 'admin132@gmail.com',
                'type' => 1,
                'password' => bcrypt('henKuaia*1'),
            ],
            [
                'name' => 'Goi Rong',
                'username' => 'grngx121',
                'email' => 'groxx132@gmail.com',
                'type' => 0,
                'password' => bcrypt('henXiang*1'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
