<?php

use Illuminate\Database\Seeder;
use xatbot\Models\BotlangSentences;
use xatbot\Models\Bot;

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
                'sentences' => ['en' => 'Sorry, you aren\'t the appropriate rank for this command!']
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
                'name' => 'user.notfound',
                'sentences' => ['en' => 'This user does not exist!']
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
                'name' => 'user.haveoptoutwithsuccess',
                'sentences' => ['en' => 'You have successfully opted out of userinfo.']
            ],
            [
                'name' => 'user.haveoptedinto',
                'sentences' => ['en' => 'You have successfully opted into userinfo.']
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
                'sentences' => ['en' => 'Allmissing for $0 can be viewed here: ']
            ],
            [
                'name' => 'cmd.everymissing.canbeseen',
                'sentences' => ['en' => 'Everymissing for $0 can be viewed here: ']
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
                'name' => 'minrank.minranknotvalid',
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
            ],
            [
                'name' => 'gameban.notvalid',
                'sentences' => ['en' => 'This gameban is not valid!']
            ],
            [
                'name' => 'cmd.doinpc',
                'sentences' => ['en' => 'Please do this command in pc!']
            ],
            [
                'name' => 'cmd.wrongpass',
                'sentences' => ['en' => 'Wrong password!']
            ],
            [
                'name' => 'cmd.getmain.tryin10',
                'sentences' => ['en' => 'Please try again in 10 minutes']
            ],
            [
                'name' => 'cmd.getmain.cantget',
                'sentences' => ['en' => 'I can\'t get main at the moment! :(']
            ],
            [
                'name' => 'cmd.getmain.gotmain',
                'sentences' => ['en' => 'OH ! I\'m main owner now (cool#).']
            ],
            [
                'name' => 'cmd.guestself',
                'sentences' => ['en' => 'I\'m now a guest!']
            ],
            [
                'name' => 'cmd.doesnotexist',
                'sentences' => ['en' => 'This command does not exist!']
            ],
            [
                'name' => 'cmd.powernotexist',
                'sentences' => ['en' => 'This power does not exist!']
            ],
            [
                'name' => 'cmd.poweridnotexit',
                'sentences' => ['en' => 'This power ID does not exist!']
            ],
            [
                'name' => 'cmd.notvalidrank',
                'sentences' => ['en' => 'This rank is not valid!']
            ],
            [
                'name' => 'cmd.kickafkok',
                'sentences' => ['en' => 'The kickafk time has been changed to $0 minutes.']
            ],
            [
                'name' => 'cmd.horoscope',
                'sentences' => ['en' => 'Love: $0%, health: $1%, luck: $2%, money: $3%.']
            ],
            [
                'name' => 'message.cannotbeempty',
                'sentences' => ['en' => 'The message cannot be empty.']
            ],
            [
                'name' => 'cmd.joke.errorgrab',
                'sentences' => ['en' => 'I am unable to grab a joke at this moment, please try again later.']
            ],
            [
                'name' => 'cmd.lastseen.was',
                'sentences' => ['en' => '$0 was last seen in the chat $1 on $2']
            ],
            [
                'name' => 'user.optoutuserinfo',
                'sentences' => ['en' => '$0 has chosen to opt out of userinfo.']
            ],
            [
                'name' => 'cmd.leastactive',
                'sentences' => ['en' => 'The current least active user is $0 with a time of $1.']
            ],
            [
                'name' => 'cmd.listsmilies.nosmilies',
                'sentences' => ['en' => '$0 currently doesn\'t have smilies.']
            ],
            [
                'name' => 'cmd.listsmilies.notpower',
                'sentences' => ['en' => '$0 is not a power.']
            ],
            [
                'name' => 'cmd.logs.seenhere',
                'sentences' => ['en' => 'Logs can be seen here: $0']
            ],
            [
                'name' => 'cmd.love.100percent',
                'sentences' => ['en' => '[$0] - Woooow ! $1 + $2 = (L#) !']
            ],
            [
                'name' => 'cmd.love.result',
                'sentences' => ['en' => '[$0] - Love test: $1 and $2 are $3% compatible.']
            ],
            [
                'name' => 'cmd.mail.nomessage',
                'sentences' => ['en' => 'You have no messages!']
            ],
            [
                'name' => 'cmd.mail.endmessage',
                'sentences' => ['en' => 'End of messages.']
            ],
            [
                'name' => 'cmd.mail.inboxempty',
                'sentences' => ['en' => 'Mail inbox emptied!']
            ],
            [
                'name' => 'cmd.mail.youhave',
                'sentences' => ['en' => 'You have $0 unread messages, $1 read messages and $2 stored messages!']
            ],
            [
                'name' => 'cmd.mail.maildeleted',
                'sentences' => ['en' => 'Mail deleted!']
            ],
            [
                'name' => 'cmd.mail.doesnotexit',
                'sentences' => ['en' => 'This mail does not exist or does not belong to you!']
            ],
            [
                'name' => 'cmd.mail.mailunstored',
                'sentences' => ['en' => 'Mail unstored!']
            ],
            [
                'name' => 'cmd.mail.onlymain',
                'sentences' => ['en' => 'Only main owners can use this command!']
            ],
            [
                'name' => 'cmd.mail.sentstaff',
                'sentences' => ['en' => 'Message sent to all staff.']
            ],
            [
                'name' => 'cmd.mail.notallowed',
                'sentences' => ['en' => 'You are not allowed to send a mail to this account.']
            ],
            [
                'name' => 'cmd.mail.toomanyunread',
                'sentences' => ['en' => 'Sorry, $0 has too many unread messages.']
            ],
            [
                'name' => 'cmd.mail.messagesent',
                'sentences' => ['en' => 'Message sent to $0($1)!']
            ],
            [
                'name' => 'cmd.mail.cantmailyourself',
                'sentences' => ['en' => 'You cannot send a mail to yourself!']
            ],
            [
                'name' => 'cmd.minrank.minrankfor',
                'sentences' => ['en' => 'The minrank for $0 is $1.']
            ],
            [
                'name' => 'cmd.minrank.isalready',
                'sentences' => ['en' => 'The minrank is already set to $0.']
            ],
            [
                'name' => 'cmd.minrank.newminrank',
                'sentences' => ['en' => 'The new minrank for $0 is $1.']
            ],
            [
                'name' => 'cmd.misc.reserve',
                'sentences' => ['en' => '$0 reserved $1 is $2 $3 of being reserved.']
            ],
            [
                'name' => 'chat.notfound',
                'sentences' => ['en' => 'This chat does not exist!']
            ],
            [
                'name' => 'cmd.misc.chatid.result',
                'sentences' => ['en' => 'Chat ID for $0 is $1.']
            ],
            [
                'name' => 'cmd.misc.chatname.result',
                'sentences' => ['en' => 'Chat name for $0 is $1.']
            ],
            [
                'name' => 'cmd.misc.xatid',
                'sentences' => ['en' => 'ID for user $0 is $1']
            ],
            [
                'name' => 'cmd.misc.regname',
                'sentences' => ['en' => 'Regname for user $0 is $1']
            ],
            [
                'name' => 'cmd.misc.promoted',
                'sentences' => ['en' => '[$0] promoted $1 $2: $3']
            ],
            [
                'name' => 'cmd.mostactive',
                'sentences' => ['en' => 'The current most active user is $0 with a time of $1.']
            ],
            [
                'name' => 'cmd.online.42',
                'sentences' => ['en' => '42 does not appear online on friendslist, so it is impossible to determine if he is online or not.']
            ],
            [
                'name' => 'cmd.pc.gotpc',
                'sentences' => ['en' => 'The user got the pc!']
            ],
            [
                'name' => 'cmd.pm.gotpm',
                'sentences' => ['en' => 'The user got the pm!']
            ],
            [
                'name' => 'cmd.pool.movingto',
                'sentences' => ['en' => 'I am moving to $0 pool!']
            ],
            [
                'name' => 'users.nodays',
                'sentences' => ['en' => 'There is no user with days in this chat :(.']
            ],
            [
                'name' => 'cmd.poorest',
                'sentences' => ['en' => 'The poorest user in this room is $0($1).']
            ],
            [
                'name' => 'cmd.power.cantenablemint',
                'sentences' => ['en' => 'Sorry you can\'t enable MINT power.']
            ],
            [
                'name' => 'cmd.power.powerenabled',
                'sentences' => ['en' => 'Power has been enabled!']
            ],
            [
                'name' => 'cmd.power.isnotdisabled',
                'sentences' => ['en' => 'This power is not disabled!']
            ],
            [
                'name' => 'cmd.power.powerdisabled',
                'sentences' => ['en' => 'Power has been disabled!']
            ],
            [
                'name' => 'cmd.power.isnotenabled',
                'sentences' => ['en' => 'This power is not enabled!']
            ],
            [
                'name' => 'cmd.power.every',
                'sentences' => ['en' => 'Every powers have been enabled!']
            ],
            [
                'name' => 'cmd.power.powerslist',
                'sentences' => ['en' => 'List of disabled powers: $0.']
            ],
            [
                'name' => 'cmd.premium.ispremiumfor',
                'sentences' => ['en' => 'I am premium for the next $0.']
            ],
            [
                'name' => 'cmd.premium.isfrozen',
                'sentences' => ['en' => 'I\'m frozen.']
            ],
            [
                'name' => 'cmd.premium.notpremium',
                'sentences' => ['en' => 'I\'m not premium.']
            ],
            [
                'name' => 'cmd.premium.alreadyfrozen',
                'sentences' => ['en' => 'I\'m already frozen.']
            ],
            [
                'name' => 'cmd.premium.nowfrozen',
                'sentences' => ['en' => 'I\'m now frozen.']
            ],
            [
                'name' => 'cmd.premium.nowunfrozen',
                'sentences' => ['en' => 'I\'m now un-frozen.']
            ]
            ,
            [
                'name' => 'cmd.premium.notfrozen',
                'sentences' => ['en' => 'I\'m not frozen.']
            ],
            [
                'name' => 'cmd.price.thosepowers',
                'sentences' => ['en' => 'Those powers cost $0 - $1 xats OR $2 - $3 days.']
            ],
            [
                'name' => 'cmd.price.notpriced',
                'sentences' => ['en' => '[$0] $1 has not been priced yet.']
            ],
            [
                'name' => 'cmd.didyoumean',
                'sentences' => ['en' => 'Did you mean "$0" ? ']
            ],
            [
                'name' => 'cmd.price.result',
                'sentences' => ['en' => '$0 [$1] $2 costs $3 - $4 xats OR $5 - $6 days.']
            ],
            [
                'name' => 'cmd.radio.listeningto',
                'sentences' => ['en' => 'Listening to: $0 $1/$2.']
            ],
            [
                'name' => 'cmd.radio.error',
                'sentences' => ['en' => 'You have an error with the radio!']
            ],
            [
                'name' => 'cmd.randomsmiley.mustbe',
                'sentences' => ['en' => 'Must be 1 - 25.']
            ],
            [
                'name' => 'cmd.randomsmiley.generated',
                'sentences' => ['en' => 'Randomly generated smiley : ($0#)']
            ],
            [
                'name' => 'cmd.refresh',
                'sentences' => ['en' => 'Refreshing...']
            ],
            [
                'name' => 'cmd.response.inuse',
                'sentences' => ['en' => 'This response is currently in use!']
            ],
            [
                'name' => 'cmd.response.added',
                'sentences' => ['en' => 'The response has been added!']
            ],
            [
                'name' => 'cmd.response.removed',
                'sentences' => ['en' => 'The response has been removed!']
            ],
            [
                'name' => 'cmd.response.notfound',
                'sentences' => ['en' => 'I could not find the response in the list.']
            ],
            [
                'name' => 'cmd.richest',
                'sentences' => ['en' => 'The richest user in this room is $0($1).']
            ],
            [
                'name' => 'cmd.scroll.ownerplus',
                'sentences' => ['en' => 'I need to be owner+ to set a scroller. :(']
            ],
            [
                'name' => 'cmd.scroll.nowcleared',
                'sentences' => ['en' => 'The scroll is now cleared!']
            ],
            [
                'name' => 'cmd.scroll.isnow',
                'sentences' => ['en' => 'The scroll is now set to $0.']
            ],
            [
                'name' => 'cmd.search.nothing',
                'sentences' => ['en' => 'Sorry, I don\'t have any message about this.']
            ],
            [
                'name' => 'cmd.sinbin.notmod',
                'sentences' => ['en' => 'That user is not a moderator.']
            ],
            [
                'name' => 'cmd.slots.won',
                'sentences' => ['en' => '$0 $1 and won! (clap#)']
            ],
            [
                'name' => 'cmd.slots.lost',
                'sentences' => ['en' => '$0 $1 and lost! :p']
            ],
            [
                'name' => 'cmd.started',
                'sentences' => ['en' => 'I was started $0 ago.']
            ],
            [
                'name' => 'cmd.unbadge.notbadged',
                'sentences' => ['en' => 'This user is not badged!']
            ],
            [
                'name' => 'cmd.unbadge.nowunbadged',
                'sentences' => ['en' => 'This user is now unbadged!']
            ],
            [
                'name' => 'cmd.unbadge.notdunced',
                'sentences' => ['en' => 'This user is not dunced!']
            ],
            [
                'name' => 'cmd.unbadge.nowundunced',
                'sentences' => ['en' => 'This user is now undunced!']
            ],
            [
                'name' => 'cmd.unbadge.notnaughty',
                'sentences' => ['en' => 'This user is not naughtystepped!']
            ],
            [
                'name' => 'cmd.unbadge.nowunaughty',
                'sentences' => ['en' => 'This user is now unnaughtystepped!']
            ],
            [
                'name' => 'cmd.unbadge.notyellow',
                'sentences' => ['en' => 'This user is not yellowcarded!']
            ],
            [
                'name' => 'cmd.unbadge.nowunyellowcarded',
                'sentences' => ['en' => 'This user is now unyellowcarded!']
            ],
            [
                'name' => 'cmd.xatwiki.notfound',
                'sentences' => ['en' => 'Wiki page was not found!']
            ],
            [
                'name' => 'cmd.xatwiki.wikifor',
                'sentences' => ['en' => 'Wiki page for $0 : https://xat.wiki/$0']
            ],
            [
                'name' => 'cmd.youtube.cantsearch',
                'sentences' => ['en' => 'Sorry i can\'t reach youtube at this time, please try again later.']
            ],
            [
                'name' => 'cmd.youtube.nothingfound',
                'sentences' => ['en' => 'I found nothing for that search. :(']
            ],
            [
                'name' => 'cmd.wikipedia.cantsearch',
                'sentences' => ['en' => 'I can\'t reach wikipedia.org at this monent, please try again later.']
            ],
            [
                'name' => 'cmd.wikipedia.nothingfound',
                'sentences' => ['en' => 'Wikipedia page could not be found.']
            ],
            [
                'name' => 'cmd.users.nobodyhere',
                'sentences' => ['en' => 'Why is there nobody here?']
            ],
            [
                'name' => 'cmd.users.count',
                'sentences' => ['en' => 'There is $0 user$1 online in this chatroom']
            ],
            [
                'name' => 'cmd.value.cantvalueunregister',
                'sentences' => ['en' => 'You cannot value an unregistered account!']
            ],
            [
                'name' => 'cmd.value.cantvaluewithoutdays',
                'sentences' => ['en' => 'You cannot value an account without days!']
            ],
            [
                'name' => 'cmd.value.nopowers',
                'sentences' => ['en' => '$0 has no powers.']
            ],
            [
                'name' => 'cmd.value.message',
                'sentences' => ['en' => '$0 [$1] powers, [$2] doubles are worth $3 - $4 xats or $5 - $6 days or in cash worth $7 - $8 euros or $9 - $10 USD. Auction: $11 xats.']
            ],
            [
                'name' => 'cmd.weather.notfound',
                'sentences' => ['en' => 'This city was not found or something went wrong!']
            ],
            [
                'name' => 'cmd.weather.message',
                'sentences' => ['en' => 'Weather for $0 ($1): $2 $3 | Temperature: [$4°F | $5°C | $6K] | Humidity: $7%.']
            ],
            [
                'name' => 'cmd.whatis.notasmiley',
                'sentences' => ['en' => '$0 is a power, not a smiley.']
            ],
            [
                'name' => 'cmd.whatis.message',
                'sentences' => ['en' => '($0) is from the power ($1)']
            ],
            [
                'name' => 'cmd.whatis.isfreesmiley',
                'sentences' => ['en' => '"$0" is a free smiley.']
            ],
            [
                'name' => 'cmd.whatis.notfound',
                'sentences' => ['en' => '"$0" was not found as a smiley.']
            ],
            [
                'name' => 'cmd.store.allpowers',
                'sentences' => ['en' => '"Allpowers" cost $0 xats in store.']
            ],
            [
                'name' => 'cmd.store.everypower',
                'sentences' => ['en' => '"Everypower" cost $0 xats in store.']
            ],
            [
                'name' => 'cmd.store.thosepowers',
                'sentences' => ['en' => 'Those powers cost $0 xats in store.']
            ],
            [
                'name' => 'cmd.store.isunknown',
                'sentences' => ['en' => 'is unknown in store. (This power is not added yet).']
            ],
            [
                'name' => 'cmd.store.message',
                'sentences' => ['en' => 'costs $0 xats in store.']
            ],
            [
                'name' => 'cmd.twitter.notfound',
                'sentences' => ['en' => 'This user was not found!']
            ],
            [
                'name' => 'cmd.twitter.message',
                'sentences' => ['en' => 'Last tweet for [$0] with $1 followers : $2']
            ],
            [
                'name' => 'cmd.twitch.invalidusername',
                'sentences' => ['en' => 'This twitch username is invalid!']
            ],
            [
                'name' => 'cmd.twitch.channelnotfound',
                'sentences' => ['en' => 'Channel "$0" does not exist.']
            ],
            [
                'name' => 'cmd.twitch.notstreaming',
                'sentences' => ['en' => '[$0] is not streaming right now. [Channel : https://twitch.tv/$1 ]']
            ],
            [
                'name' => 'cmd.spotify.pleaserefresh',
                'sentences' => ['en' => 'Please refresh!']
            ],
            [
                'name' => 'cmd.spotify.pleaserelogin',
                'sentences' => ['en' => 'Please relogin to Spotify on panel.']
            ],
            [
                'name' => 'cmd.spotify.notlistening',
                'sentences' => ['en' => '$0 is not listening to Spotify.']
            ],
            [
                'name' => 'cmd.spotify.islistening',
                'sentences' => ['en' => '$0 is listening to: ']
            ],
            [
                'name' => 'cmd.spotify.waslistening',
                'sentences' => ['en' => '$0 was listening to: ']
            ],
            [
                'name' => 'cmd.spotify.nospotify',
                'sentences' => ['en' => 'You don\'t have spotify linked to your account.']
            ],
            [
                'name' => 'cmd.snitch.added',
                'sentences' => ['en' => '$0($1)has been added to the list!']
            ],
            [
                'name' => 'cmd.snitch.removed',
                'sentences' => ['en' => '$0 has been removed from the list!']
            ],
            [
                'name' => 'cmd.snitch.notfound',
                'sentences' => ['en' => 'I could not find this user in the list.']
            ],
            [
                'name' => 'cmd.staff.alreadyadded',
                'sentences' => ['en' => 'This user is already added!']
            ],
            [
                'name' => 'cmd.staff.added',
                'sentences' => ['en' => '$0($1)has been added as $2.']
            ],
            [
                'name' => 'cmd.staff.removed',
                'sentences' => ['en' => '$0 has been removed from the list!']
            ],
            [
                'name' => 'cmd.staff.notfound',
                'sentences' => ['en' => 'I could not find this user in the list.']
            ],
            [
                'name' => 'cmd.shortname.badchars',
                'sentences' => ['en' => 'Shortname contains bad characters.']
            ],
            [
                'name' => 'cmd.shortname.tooshort',
                'sentences' => ['en' => 'Too short for a shortname. Minimum 4 letters.']
            ],
            [
                'name' => 'cmd.shortname.toolong',
                'sentences' => ['en' => 'Too long for a shortname. Maximum 9 letters.']
            ],
            [
                'name' => 'cmd.shortname.cantstartwithanumber',
                'sentences' => ['en' => 'Shortnames can\'t start with a number.']
            ],
            [
                'name' => 'cmd.shortname.cantaccess',
                'sentences' => ['en' => 'Cannot access page right now.']
            ],
            [
                'name' => 'cmd.shortname.notallowed',
                'sentences' => ['en' => 'The shortname $0 is not allowed.']
            ],
            [
                'name' => 'cmd.shortname.istakenrelease',
                'sentences' => ['en' => 'The shortname $0 is taken but can be released via ticket.']
            ],
            [
                'name' => 'cmd.shortname.istaken',
                'sentences' => ['en' => 'The shortname $0 is taken and cannot be released via ticket.']
            ],
            [
                'name' => 'cmd.shortname.costs',
                'sentences' => ['en' => '$0 costs $1 xats.']
            ],
            [
                'name' => 'cmd.shortname.unknownerror',
                'sentences' => ['en' => 'Unknown error']
            ]
        ];

        foreach ($sentences as $sentence) {
            $botmessages = new BotlangSentences;
            $botmessages->name = $sentence['name'];
            $botmessages->sentences = $sentence['sentences'];
            $botmessages->save();

            $bots = Bot::all();

            if (sizeof($bots) > 0) {
                foreach ($bots as $bot) {
                    $bot->botlang()->save($botmessages);
                }
            }
        }
    }
}
