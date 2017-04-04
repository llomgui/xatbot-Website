<?php

use Illuminate\Database\Seeder;
use OceanProject\Models\Server;

class ServersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servers = [
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
        ];

        foreach ($servers as $server) {
            Server::create($server);
        }
    }
}
