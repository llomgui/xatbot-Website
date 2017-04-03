<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ServersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servers')->insert(
            ['name' => 'Sun'],
            ['name' => 'Mercury'],
            ['name' => 'Venus'],
            ['name' => 'Earth'],
            ['name' => 'Mars'],
            ['name' => 'Jupiter'],
            ['name' => 'Saturn'],
            ['name' => 'Uranus'],
            ['name' => 'Neptune'],
            ['name' => 'Pluto']
        );
    }
}
