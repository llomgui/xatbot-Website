<?php

use Illuminate\Database\Seeder;
use Ultraware\Roles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'slug' => 'Admin',
            'description' => '',
            'level' => 10,
        ]);
        Role::create([
            'name' => 'senior.helper',
            'slug' => 'Senior Helper',
            'description' => '',
            'level' => 4,
        ]);
        Role::create([
            'name' => 'helper',
            'slug' => 'Helper',
            'description' => '',
            'level' => 3,
        ]);
        Role::create([
            'name' => 'translator',
            'slug' => 'Translator',
            'description' => '',
            'level' => 2,
        ]);
        Role::create([
            'name' => 'user',
            'slug' => 'User',
            'description' => '',
            'level' => 1,
        ]);
    }
}
