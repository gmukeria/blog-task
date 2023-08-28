<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'id' => 2,
                'name' => 'editor',
                'guard_name' => 'web',
            ],
            [
                'id' => 3,
                'name' => 'user',
                'guard_name' => 'web',
            ],
        ];

        foreach ($data as $record) {
            Role::create($record);
        }
    }
}
