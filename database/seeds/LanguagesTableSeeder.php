<?php

use Illuminate\Database\Seeder;
use OceanProject\Models\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['name' => 'English', 'code' => 'en'],
            ['name' => 'Français', 'code' => 'fr']
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
