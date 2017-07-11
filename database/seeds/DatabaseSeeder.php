<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(ServersTableSeeder::class);
        $this->call(MinranksTableSeeder::class);
        $this->call(CommandsTableSeeder::class);
        $this->call(BotStatusesTableSeeder::class);
        $this->call(BotlangSentencesTableSeeder::class);
        $this->call(TicketDepartmentsTableSeeder::class);
    }
}
