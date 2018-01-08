<?php

use Illuminate\Database\Seeder;
use xatbot\Models\BotStatus;

class BotStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'Online'],
            ['name' => 'Offline'],
            ['name' => 'Error'],
            ['name' => 'Suspended']
        ];

        foreach ($statuses as $status) {
            BotStatus::create($status);
        }
    }
}
