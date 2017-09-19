<div class="navbar-custom">
    <div class="container">
        <div id="navigation">
            <ul class="navigation-menu">
                <li class="has-submenu">
                    <a href="{{ route('panel') }}"><i class="md md-home"></i>Dashboard</a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="md md-settings"></i>Bot</a>
                    <ul class="submenu">
                        <li><a href="{{ route('bot.edit') }}">General Settings</a></li>
                        <li class="has-submenu">
                            <a href="#">Lists</a>
                            <ul class="submenu">
                                <li><a href="{{ route('bot.staff') }}">Staff</a></li>
                                <li><a href="{{ route('bot.autotemp') }}">AutoTemp</a></li>
                                <li><a href="{{ route('bot.snitch') }}">Snitch</a></li>
                                <li><a href="{{ route('bot.autoban') }}">AutoBan</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Behavior Manager</a>
                            <ul class="submenu">
                                <li><a href="{{ route('bot.response') }}">Responses</a></li>
                                <li><a href="{{ route('bot.badword') }}">Bad Words</a></li>
                                <li><a href="{{ route('bot.link') }}">Link Filter</a></li>
                                <li><a href="{{ route('bot.botlang') }}">Bot Messages</a></li>
                                <li><a href="#">Hangman Words</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Command Manager</a>
                            <ul class="submenu">
                                <li><a href="{{ route('bot.minrank') }}">Minranks</a></li>
                                <li><a href="{{ route('bot.alias') }}">Aliases</a></li>
                                <li><a href="{{ route('bot.customcmd') }}">Custom commands</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('bot.powers') }}">Bot Powers</a></li>
                        <li><a href="#">Chat Logs</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="md md-pages"></i>Pages</a>
                    <ul class="submenu">
                        <li><a href="{{ route('chat') }}">Chat</a></li>
                        <li><a href="{{ route('commands', Session('onBotEdit')) }}">Commands</a></li>
                        <li><a href="#">Get Premium</a></li>
                        <li><a href="#">Ocean Staff</a></li>
                        <li><a href="{{ route('userinfo') }}">Userinfo</a></li>
                        <li><a href="{{ route('servers') }}">Servers</a></li>
                        <li><a href="{{ route('everymissing') }}">Everymissing</a></li>
                        <li><a href="{{ route('allmissing') }}">Allmissing</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('support.list') }}"><i class="md md-help"></i>Support</a>
                </li>
                @level(3)
                <li class="has-submenu">
                    <a href="#"><i class="md md-people"></i>Staff</a>
                    <ul class="submenu">
                        <li><a href="{{ route('staff.users') }}">Users</a></li>
                        <li><a href="{{ route('staff.bots') }}">Bots</a></li>
                        <li><a href="{{ route('staff.tickets') }}">Ticket</a></li>
                        @role('admin')
                        <li><a href="{{ route('staff.commands') }}">Commands</a></li>
                        <li><a href="{{ route('staff.servers') }}">Servers</a></li>
                        @endrole
                    </ul>
                </li>
                @endlevel
            </ul>
        </div>
    </div>
</div>