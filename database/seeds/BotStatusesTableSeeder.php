<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
    		['name' => 'xat server offline'],
    		['name' => 'Suspended']
    	];

    	foreach ($statuses as $status) {
	        DB::table('bot_statuses')->insert($status);
    	}
    }
}
