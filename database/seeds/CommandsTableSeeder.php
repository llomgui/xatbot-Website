<?php

use Illuminate\Database\Seeder;

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
            ['name' => '8ball', 'description' => ''],
            ['name' => 'active', 'description' => ''],
            ['name' => 'allmissing', 'description' => ''],
            ['name' => 'badge', 'description' => ''],
            ['name' => 'ban', 'description' => ''],
            ['name' => 'boot', 'description' => ''],
            ['name' => 'bump', 'description' => ''],
            ['name' => 'calc', 'description' => ''],
            ['name' => 'chatinfos', 'description' => ''],
            ['name' => 'choose', 'description' => ''],
            ['name' => 'clear', 'description' => ''],
            ['name' => 'countdown', 'description' => ''],
            ['name' => 'dice', 'description' => ''],
            ['name' => 'die', 'description' => ''],
            ['name' => 'dunce', 'description' => ''],
            ['name' => 'dx', 'description' => ''],
            ['name' => 'everymissing', 'description' => ''],
            ['name' => 'gag', 'description' => ''],
            ['name' => 'gameban', 'description' => ''],
            ['name' => 'gamebanme', 'description' => ''],
            ['name' => 'getmain', 'description' => ''],
            ['name' => 'guestself', 'description' => ''],
            ['name' => 'hash', 'description' => ''],
            ['name' => 'horoscope', 'description' => ''],
            ['name' => 'hush', 'description' => ''],
            ['name' => 'jinx', 'description' => ''],
            ['name' => 'joke', 'description' => ''],
            ['name' => 'kick', 'description' => ''],
            ['name' => 'kickall', 'description' => ''],
            ['name' => 'latestpower', 'description' => ''],
            ['name' => 'listsmilies', 'description' => ''],
            ['name' => 'love', 'description' => ''],
            ['name' => 'misc', 'description' => ''],
            ['name' => 'mostactive', 'description' => ''],
            ['name' => 'mute', 'description' => ''],
            ['name' => 'naughtystep', 'description' => ''],
            ['name' => 'online', 'description' => ''],
            ['name' => 'pool', 'description' => ''],
            ['name' => 'poorest', 'description' => ''],
            ['name' => 'price', 'description' => ''],
            ['name' => 'randomnumber', 'description' => ''],
            ['name' => 'randomsmiley', 'description' => ''],
            ['name' => 'randomuser', 'description' => ''],
            ['name' => 'rank', 'description' => ''],
            ['name' => 'reverseban', 'description' => ''],
            ['name' => 'say', 'description' => ''],
            ['name' => 'search', 'description' => ''],
            ['name' => 'shortname', 'description' => ''],
            ['name' => 'sinbin', 'description' => ''],
            ['name' => 'slots', 'description' => ''],
            ['name' => 'started', 'description' => ''],
            ['name' => 'store', 'description' => ''],
            ['name' => 'temp', 'description' => ''],
            ['name' => 'test', 'description' => ''],
            ['name' => 'twitch', 'description' => ''],
            ['name' => 'unbadge', 'description' => ''],
            ['name' => 'unban', 'description' => ''],
            ['name' => 'undunce', 'description' => ''],
            ['name' => 'unnaughtystep', 'description' => ''],
            ['name' => 'unyellowcard', 'description' => ''],
            ['name' => 'users', 'description' => ''],
            ['name' => 'value', 'description' => ''],
            ['name' => 'wallet', 'description' => ''],
            ['name' => 'whatis', 'description' => ''],
            ['name' => 'wikipedia', 'description' => ''],
            ['name' => 'xd', 'description' => ''],
            ['name' => 'yellowcard', 'description' => ''],
            ['name' => 'youtube', 'description' => ''],
            ['name' => 'zap', 'description' => ''],
            ['name' => 'zipban', 'description' => ''],
            ['name' => 'guestme', 'description' => ''],
            ['name' => 'memberme', 'description' => ''],
            ['name' => 'modme', 'description' => ''],
            ['name' => 'ownerme', 'description' => '']];

        foreach ($commands as $command) {
            DB::table('commands')->insert($command);
        }
    }
}
