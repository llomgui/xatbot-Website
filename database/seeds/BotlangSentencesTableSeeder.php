<?php

use Illuminate\Database\Seeder;
use OceanProject\Models\BotlangSentences;

class BotlangSentencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sentences = [
            [
                'name' => 'not.enough.rank',
                'default_value' => 'Sorry you do not have enough rank to use this command!'
            ],
            [
                'name' => 'missing.power',
                'default_value' => 'Sorry, but I do not have the power $0.'
            ],
            [
                'name' => 'user.missing.power',
                'default_value' => '$0 does not have the power $1 or it is disabled.'
            ],
            [
                'name' => 'user.not.here',
                'default_value' => 'That user is not here.'
            ],
            [
                'name' => 'user.already',
                'default_value' => 'That user is already $0.'
            ],
            [
                'name' => 'cmd.wallet',
                'default_value' => '$0 has $1 xats and $2 days.'
            ],
            [
                'name' => 'cmd.xd',
                'default_value' => '$0 $1 equals $2 $3.'
            ],
            [
                'name' => 'cmd.chatinfos.notfound',
                'default_value' => 'No $0 for this chat.'
            ],
            [
                'name' => 'cmd.chatinfos.found',
                'default_value' => 'The radio for the chat $0: _$1'
            ],
        ];

        foreach ($sentences as $sentence) {
            BotlangSentences::create($sentence);
        }
    }
}
