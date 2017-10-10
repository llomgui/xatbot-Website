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
                'default_value' => 'The $0 for the chat $1: _$2'
            ],
            [
                'name' => 'cmd.active.string',
                'default_value' => '$0 has been at this chat(while I was here)for: $1'
            ],
            [
                'name' => 'cmd.alias.alreadyused',
                'default_value' => 'This alias is already in use!'
            ],
            [
                'name' => 'cmd.alias.alreadycommand',
                'default_value' => 'This alias is already a command!'
            ],
            [
                'name' => 'cmd.alias.notcommand',
                'default_value' => 'The current command is not a command!'
            ],
            [
                'name' => 'cmd.alias.added',
                'default_value' => 'The alias has been added!'
            ],
            [
                'name' => 'cmd.alias.removed',
                'default_value' => '$0 has been removed from the list!'
            ],
            [
                'name' => 'cmd.alias.notinlist',
                'default_value' => 'I could not find this alias in the list.'
            ],
            [
                'name' => 'cmd.allmissing.canbeseen',
                'default_value' => 'Allmissing for $0 can be viewed here : '
            ],
            [
                'name' => 'user.notindatabase',
                'default_value' => 'Sorry, I don\'t have this user in my database.'
            ],
            [
                'name' => 'xatid.notexist',
                'default_value' => 'The xatid does not exist!'
            ],
            [
                'name' => 'xatid.notvalid',
                'default_value' => 'The xatid is not valid!'
            ],
            [
                'name' => 'method.notvalid',
                'default_value' => 'The method is invalid!'
            ],
            [
                'name' => 'hours.notvalid',
                'default_value' => 'The number of hours is invalid!'
            ],
            [
                'name' => 'user.addedtolist',
                'default_value' => '$0($1)has been added to the list!'
            ],
            [
                'name' => 'user.removedtolist',
                'default_value' => '$0 has been removed from the list!'
            ],
            [
                'name' => 'user.notinlist',
                'default_value' => 'I could not find this user in the list.'
            ],
            [
                'name' => 'user.alreadyadded',
                'default_value' => 'The user is already added!'
            ]
        ];

        foreach ($sentences as $sentence) {
            BotlangSentences::create($sentence);
        }
    }
}
