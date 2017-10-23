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
                'sentences' => ['en' => 'Sorry you do not have enough rank to use this command!']
            ],
            [
                'name' => 'missing.power',
                'sentences' => ['en' => 'Sorry, but I do not have the power $0.']
            ],
            [
                'name' => 'user.missing.power',
                'sentences' => ['en' => '$0 does not have the power $1 or it is disabled.']
            ],
            [
                'name' => 'user.not.here',
                'sentences' => ['en' => 'That user is not here.']
            ],
            [
                'name' => 'user.already',
                'sentences' => ['en' => 'That user is already $0.']
            ],
            [
                'name' => 'cmd.wallet',
                'sentences' => ['en' => '$0 has $1 xats and $2 days.']
            ],
            [
                'name' => 'cmd.xd',
                'sentences' => ['en' => '$0 $1 equals $2 $3.']
            ],
            [
                'name' => 'cmd.chatinfos.notfound',
                'sentences' => ['en' => 'No $0 for this chat.']
            ],
            [
                'name' => 'cmd.chatinfos.found',
                'sentences' => ['en' => 'The $0 for the chat $1: _$2']
            ],
            [
                'name' => 'cmd.active.string',
                'sentences' => ['en' => '$0 has been at this chat(while I was here)for: $1']
            ],
            [
                'name' => 'cmd.alias.alreadyused',
                'sentences' => ['en' => 'This alias is already in use!']
            ],
            [
                'name' => 'cmd.alias.alreadycommand',
                'sentences' => ['en' => 'This alias is already a command!']
            ],
            [
                'name' => 'cmd.alias.notcommand',
                'sentences' => ['en' => 'The current command is not a command!']
            ],
            [
                'name' => 'cmd.alias.added',
                'sentences' => ['en' => 'The alias has been added!']
            ],
            [
                'name' => 'cmd.alias.removed',
                'sentences' => ['en' => '$0 has been removed from the list!']
            ],
            [
                'name' => 'cmd.alias.notinlist',
                'sentences' => ['en' => 'I could not find this alias in the list.']
            ],
            [
                'name' => 'cmd.allmissing.canbeseen',
                'sentences' => ['en' => 'Allmissing for $0 can be viewed here : ']
            ],
            [
                'name' => 'user.notindatabase',
                'sentences' => ['en' => 'Sorry, I don\'t have this user in my database.']
            ],
            [
                'name' => 'xatid.notexist',
                'sentences' => ['en' => 'The xatid does not exist!']
            ],
            [
                'name' => 'xatid.notvalid',
                'sentences' => ['en' => 'The xatid is not valid!']
            ],
            [
                'name' => 'method.notvalid',
                'sentences' => ['en' => 'The method is invalid!']
            ],
            [
                'name' => 'hours.notvalid',
                'sentences' => ['en' => 'The number of hours is invalid!']
            ],
            [
                'name' => 'user.addedtolist',
                'sentences' => ['en' => '$0($1)has been added to the list!']
            ],
            [
                'name' => 'user.removedtolist',
                'sentences' => ['en' => '$0 has been removed from the list!']
            ],
            [
                'name' => 'user.notinlist',
                'sentences' => ['en' => 'I could not find this user in the list.']
            ],
            [
                'name' => 'user.alreadyadded',
                'sentences' => ['en' => 'The user is already added!']
            ],
            [
                'name' => 'cmd.bump.gotbump',
                'sentences' => ['en' => 'The user got the bump!']
            ],
            [
                'name' => 'cmd.calc.cantsolve',
                'sentences' => ['en' => 'Sorry I can\'t solve any equation\'s at this time, please try again later.']
            ],
            [
                'name' => 'cmd.choose.haschosen',
                'sentences' => ['en' => 'I have chosen $0.']
            ],
            [
                'name' => 'cmd.clear.clearedmessages',
                'sentences' => ['en' => 'Chat is now cleared!']
            ],
            [
                'name' => 'cmd.countdown.releasein',
                'sentences' => ['en' => 'The new power will be sold in $0.']
            ],
            [
                'name' => 'cmd.countdown.nocountdown',
                'sentences' => ['en' => 'There is no countdown at the moment.']
            ],
            [
                'name' => 'cmd.customcommand.alreadyadded',
                'sentences' => ['en' => 'This custom command is already added!']
            ],
            [
                'name' => 'cmd.customcommand.alreadycommand',
                'sentences' => ['en' => 'This is already a command!']
            ],
            [
                'name' => 'cmd.customcommand.minranknotvalid',
                'sentences' => ['en' => 'The minrank is not valid!']
            ],
            [
                'name' => 'cmd.customcommand.added',
                'sentences' => ['en' => 'The custom command "$0" has been added!']
            ],
            [
                'name' => 'cmd.customcommand.removed',
                'sentences' => ['en' => 'The custom command "$0" has been removed!']
            ],
            [
                'name' => 'cmd.customcommand.notfound',
                'sentences' => ['en' => 'This custom command was not found!']
            ],
            [
                'name' => 'cmd.customcommand.currentlist',
                'sentences' => ['en' => 'Current list: $0']
            ],
            [
                'name' => 'cmd.dice.rolled',
                'sentences' => ['en' => 'I rolled $0.']
            ],
            [
                'name' => 'cmd.die',
                'sentences' => ['en' => 'Bye!']
            ],
            [
                'name' => 'cmd.edit.nickname',
                'sentences' => ['en' => 'Nickname is updated!']
            ],
            [
                'name' => 'cmd.edit.avatar',
                'sentences' => ['en' => 'Avatar is updated!']
            ],
            [
                'name' => 'cmd.edit.homepage',
                'sentences' => ['en' => 'Homepage is updated!']
            ],
            [
                'name' => 'cmd.edit.status',
                'sentences' => ['en' => 'Status is updated!']
            ],
            [
                'name' => 'cmd.edit.pcback',
                'sentences' => ['en' => 'Pcback is updated!']
            ],
            [
                'name' => 'cmd.edit.autowelcome',
                'sentences' => ['en' => 'Autowelcome is updated!']
            ],
            [
                'name' => 'cmd.edit.ticklemessage',
                'sentences' => ['en' => 'Tickle message is updated!']
            ],
            [
                'name' => 'cmd.edit.modalreadyenabled',
                'sentences' => ['en' => 'Moderation is already enabled!']
            ],
            [
                'name' => 'cmd.edit.modenabled',
                'sentences' => ['en' => 'Moderation has been enabled.']
            ],
            [
                'name' => 'cmd.edit.modalreadydisabled',
                'sentences' => ['en' => 'Moderation is already disabled!']
            ],
            [
                'name' => 'cmd.edit.moddisabled',
                'sentences' => ['en' => 'Moderation has been disabled.']
            ],
            [
                'name' => 'cmd.edit.customcommandmaxlength',
                'sentences' => ['en' => 'The max length of customcommand is 1.']
            ],
            [
                'name' => 'cmd.edit.customcommand',
                'sentences' => ['en' => 'Customcommand is updated!']
            ]
        ];

        foreach ($sentences as $sentence) {
            BotlangSentences::create($sentence);
        }
    }
}
