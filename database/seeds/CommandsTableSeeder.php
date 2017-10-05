<?php

use Illuminate\Database\Seeder;
use OceanProject\Models\Command;

class CommandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commands = [
            ['name' => '8ball', 'description' => '', 'default_level' => 1],
            ['name' => 'active', 'description' => '', 'default_level' => 2],
            ['name' => 'allmissing', 'description' => '', 'default_level' => 1],
            ['name' => 'badge', 'description' => '', 'default_level' => 4],
            ['name' => 'ban', 'description' => '', 'default_level' => 4],
            ['name' => 'boot', 'description' => '', 'default_level' => 4],
            ['name' => 'bump', 'description' => '', 'default_level' => 3],
            ['name' => 'calc', 'description' => '', 'default_level' => 2],
            ['name' => 'chatinfos', 'description' => '', 'default_level' => 3],
            ['name' => 'choose', 'description' => '', 'default_level' => 1],
            ['name' => 'clear', 'description' => '', 'default_level' => 4],
            ['name' => 'countdown', 'description' => '', 'default_level' => 2],
            ['name' => 'dice', 'description' => '', 'default_level' => 1],
            ['name' => 'die', 'description' => '', 'default_level' => 4],
            ['name' => 'dunce', 'description' => '', 'default_level' => 3],
            ['name' => 'dx', 'description' => '', 'default_level' => 1],
            ['name' => 'edit', 'description' => '', 'default_level' => 4],
            ['name' => 'everymissing', 'description' => '', 'default_level' => 1],
            ['name' => 'gag', 'description' => '', 'default_level' => 4],
            ['name' => 'gameban', 'description' => '', 'default_level' => 3],
            ['name' => 'gamebanme', 'description' => '', 'default_level' => 2],
            ['name' => 'getmain', 'description' => '', 'default_level' => 5],
            ['name' => 'guestself', 'description' => '', 'default_level' => 4],
            ['name' => 'hash', 'description' => '', 'default_level' => 2],
            ['name' => 'horoscope', 'description' => '', 'default_level' => 1],
            ['name' => 'hush', 'description' => '', 'default_level' => 4],
            ['name' => 'jinx', 'description' => '', 'default_level' => 1],
            ['name' => 'joke', 'description' => '', 'default_level' => 2],
            ['name' => 'kick', 'description' => '', 'default_level' => 3],
            ['name' => 'kickall', 'description' => '', 'default_level' => 4],
            ['name' => 'latestpower', 'description' => '', 'default_level' => 1],
            ['name' => 'listsmilies', 'description' => '', 'default_level' => 1],
            ['name' => 'love', 'description' => '', 'default_level' => 1],
            ['name' => 'misc', 'description' => '', 'default_level' => 1],
            ['name' => 'mostactive', 'description' => '', 'default_level' => 2],
            ['name' => 'mute', 'description' => '', 'default_level' => 4],
            ['name' => 'naughtystep', 'description' => '', 'default_level' => 4],
            ['name' => 'online', 'description' => '', 'default_level' => 1],
            ['name' => 'pool', 'description' => '', 'default_level' => 4],
            ['name' => 'poorest', 'description' => '', 'default_level' => 2],
            ['name' => 'premium', 'description' => '', 'default_level' => 3],
            ['name' => 'price', 'description' => '', 'default_level' => 1],
            ['name' => 'randomnumber', 'description' => '', 'default_level' => 1],
            ['name' => 'randomsmiley', 'description' => '', 'default_level' => 1],
            ['name' => 'randomuser', 'description' => '', 'default_level' => 2],
            ['name' => 'rank', 'description' => '', 'default_level' => 4],
            ['name' => 'refresh', 'description' => '', 'default_level' => 5],
            ['name' => 'reverseban', 'description' => '', 'default_level' => 4],
            ['name' => 'say', 'description' => '', 'default_level' => 1],
            ['name' => 'search', 'description' => '', 'default_level' => 2],
            ['name' => 'shortname', 'description' => '', 'default_level' => 1],
            ['name' => 'sinbin', 'description' => '', 'default_level' => 4],
            ['name' => 'slots', 'description' => '', 'default_level' => 1],
            ['name' => 'started', 'description' => '', 'default_level' => 4],
            ['name' => 'store', 'description' => '', 'default_level' => 1],
            ['name' => 'temp', 'description' => '', 'default_level' => 4],
            ['name' => 'test', 'description' => '', 'default_level' => 1],
            ['name' => 'twitch', 'description' => '', 'default_level' => 2],
            ['name' => 'unbadge', 'description' => '', 'default_level' => 4],
            ['name' => 'unban', 'description' => '', 'default_level' => 4],
            ['name' => 'undunce', 'description' => '', 'default_level' => 3],
            ['name' => 'unnaughtystep', 'description' => '', 'default_level' => 4],
            ['name' => 'unyellowcard', 'description' => '', 'default_level' => 3],
            ['name' => 'users', 'description' => '', 'default_level' => 2],
            ['name' => 'value', 'description' => '', 'default_level' => 1],
            ['name' => 'wallet', 'description' => '', 'default_level' => 5],
            ['name' => 'whatis', 'description' => '', 'default_level' => 1],
            ['name' => 'wikipedia', 'description' => '', 'default_level' => 2],
            ['name' => 'xd', 'description' => '', 'default_level' => 1],
            ['name' => 'yellowcard', 'description' => '', 'default_level' => 3],
            ['name' => 'youtube', 'description' => '', 'default_level' => 2],
            ['name' => 'zap', 'description' => '', 'default_level' => 3],
            ['name' => 'zipban', 'description' => '', 'default_level' => 4],
            ['name' => 'hasmost', 'description' => '', 'default_level' => 1],
            ['name' => 'userinfo', 'description' => '', 'default_level' => 1],
            ['name' => 'lastseen', 'description' => '', 'default_level' => 1],
            ['name' => 'power', 'description' => '', 'default_level' => 4],
            ['name' => 'weather', 'description' => '', 'default_level' => 1],
            ['name' => 'pc', 'description' => '', 'default_level' => 1],
            ['name' => 'pm', 'description' => '', 'default_level' => 1],
            ['name' => 'scroll', 'description' => '', 'default_level' => 4],
            ['name' => 'xatwiki', 'description' => '', 'default_level' => 1],
            ['name' => 'leastactive', 'description' => '', 'default_level' => 1],
            ['name' => 'twitter', 'description' => '', 'default_level' => 1],
            ['name' => 'radio', 'description' => '', 'default_level' => 1],
            ['name' => 'autotemp', 'description' => '', 'default_level' => 4],
            ['name' => 'mail', 'description' => '', 'default_level' => 1],
            ['name' => 'snitch', 'description' => '', 'default_level' => 4],
            ['name' => 'staff', 'description' => '', 'default_level' => 4],
            ['name' => 'customcommand', 'description' => '', 'default_level' => 4],
            ['name' => 'autoban', 'description' => '', 'default_level' => 4],
            ['name' => 'minrank', 'description' => '', 'default_level' => 5],
            ['name' => 'alias', 'description' => '', 'default_level' => 5],
            ['name' => 'response', 'description' => '', 'default_level' => 5],
            ['name' => 'logs', 'description' => '', 'default_level' => 3],
            ['name' => 'spotify', 'description' => '', 'default_level' => 1],
            ['name' => 'richest', 'description' => '', 'default_level' => 1]
        ];

        foreach ($commands as $command) {
            Command::create($command);
        }
    }
}
