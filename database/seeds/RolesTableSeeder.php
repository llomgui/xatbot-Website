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
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => '',
            'level' => 1,
        ]);
        Role::create([
            'name' => 'Senior Helper',
            'slug' => 'senior.helper',
            'description' => '',
            'level' => 2,
        ]);
        Role::create([
            'name' => 'Helper',
            'slug' => 'helper',
            'description' => '',
            'level' => 3,
        ]);
        Role::create([
            'name' => 'Translator',
            'slug' => 'translator',
            'description' => '',
            'level' => 4,
        ]);
        Role::create([
            'name' => 'User',
            'slug' => 'user',
            'description' => '',
            'level' => 5,
        ]);
    }
}
