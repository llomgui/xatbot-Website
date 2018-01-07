<?php

use Illuminate\Database\Seeder;
use xatbot\Models\TicketDepartment;

class TicketDepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name' => 'Help'],
            ['name' => 'Report'],
            ['name' => 'Payment issue'],
            ['name' => 'Suggestion'],
            ['name' => 'Staff']
        ];

        foreach ($departments as $department) {
            TicketDepartment::create($department);
        }
    }
}
