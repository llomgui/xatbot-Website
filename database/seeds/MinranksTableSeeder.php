<?php

use Illuminate\Database\Seeder;
use OceanProject\Models\Minrank;

class MinranksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $minranks = [
            ['name' => 'Bot Owner', 'level' => 6],
            ['name' => 'Main Owner', 'level' => 5],
            ['name' => 'Owner', 'level' => 4],
            ['name' => 'Moderator', 'level' => 3],
            ['name' => 'Member', 'level' => 2],
            ['name' => 'Guest', 'level' => 1]
        ];

        foreach ($minranks as $minrank) {
            Minrank::create($minrank);
        }
    }
}
