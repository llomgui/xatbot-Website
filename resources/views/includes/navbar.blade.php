<div class="navbar-custom">
    <div class="container">
        <div id="navigation">
            <ul class="navigation-menu">
                <li class="has-submenu">
                    <a href="{{ route('panel') }}"><i class="ion-home"></i>Dashboard</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('chat') }}"><i class="ion-planet"></i>Chat</a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ion-help-buoy"></i>Support</a>
                    <ul class="submenu">
                        <li><a href="#">Users</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('bot.edit') }}"><i class="ion-gear-b"></i>General Settings</a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ion-person-stalker"></i>Lists</a>
                    <ul class="submenu">
                        <li><a href="{{ route('bot.staff') }}">Staff</a></li>
                        <li><a href="{{ route('bot.autotemp') }}">AutoTemp</a></li>
                        <li><a href="{{ route('bot.snitch') }}">Snitch</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ion-toggle"></i>Bot Powers</a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ion-compose"></i>Behavior Manager</a>
                    <ul class="submenu">
                        <li><a href="#">Responses</a></li>
                        <li><a href="#">Bad Words</a></li>
                        <li><a href="#">Link Filter</a></li>
                        <li><a href="#">Bot Messages</a></li>
                        <li><a href="#">Hangman Words</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ion-settings"></i>Command Manager</a>
                    <ul class="submenu">
                        <li><a href="#">Minranks</a></li>
                        <li><a href="{{ route('bot.alias') }}">Aliases</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ion-chatbox"></i>Chat Logs</a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ion-code"></i>Commands</a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ion-star"></i>Get Premium</a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ion-heart"></i>Ocean Staff</a>
                </li>
            </ul>
        </div>
    </div>
</div>