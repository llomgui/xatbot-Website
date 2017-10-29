<div class="topbar-main">
    <div class="container-fluid">

        <div class="logo">
            <a href="{{ route('panel') }}" class="logo">
                <span class="logo-small"><i class="mdi mdi-laptop"></i></span>
                <span class="logo-large"><i class="mdi mdi-laptop"></i> {{ env('NAME') }}</span>
            </a>
        </div>

        @inject('topbar', 'OceanProject\Http\Controllers\Page\TopbarController')
        @php
        $bots = $topbar->getBots();
        $languages = $topbar->getLanguages();
        @endphp

        <div class="menu-extras topbar-custom">
            @if (count($bots) > 0)
            <ul class="list-inline float-left mb-0 m-l-10">
                <li class="list-inline-item notification-list">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle waves-effect" href="#" aria-expanded="false">{{ Auth::user()->language->name }} <i class="fa fa-caret-down"></i></a>
                    <ul role="menu" class="dropdown-menu">
                    @foreach ($languages as $language)
                        @if ($language->id != Auth::user()->language_id)
                            <li><a href="#">{{ $language->name }}</a></li>
                        @endif
                    @endforeach
                    </ul>
                </li>
                <li class="list-inline-item notification-list">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle waves-effect" href="#" aria-expanded="false">{{ env('BOTID_NAME') }} {{ Session::get('onBotEdit') }} <i class="fa fa-caret-down"></i></a>
                    <ul role="menu" class="dropdown-menu">
                    @foreach ($bots as $botid)
                        @if ($botid != Session::get('onBotEdit'))
                            <li><a href="{{ route('bot.setbotid', ['botid' => $botid]) }}">{{ env('BOTID_NAME') }} {{ $botid }}</a></li>
                        @endif
                    @endforeach
                    </ul>
                </li>
            </ul>
            @endif

            <ul class="list-inline float-right mb-0">
                <li class="menu-item list-inline-item">
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                </li>

                <li class="list-inline-item notification-list">
                    <a href="{{ route('profile') }}" class="nav-link arrow-none waves-effect"><i class="ti-user m-r-5"></i> Profile</a>
                </li>
                <li class="list-inline-item dropdown notification-list">
                    <a href="#" class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ Auth::user()->avatar }}" alt="user" class="rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow"><small class="text-white">Welcome {{ Auth::user()->regname }}!</small> </h5>
                        </div>
                        <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti-power-off m-r-5"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>

    </div>
</div>