<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'id' => 1,
                'name' => 'Admin Name',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin'
            ],
            [
                'id' => 2,
                'name' => 'Editor Name',
                'email' => 'editor@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'editor'
            ],
            [
                'id' => 3,
                'name' => 'User Name',
                'email' => 'user@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'user'
            ],
        ];

        foreach ($userData as $record) {
           $user = User::create([
               'id' => $record['id'],
               'name' => $record['name'],
               'email' => $record['email'],
               'password' => $record['password'],
           ]);

           $user->assignRole($record['role']);
        }
    }
}
