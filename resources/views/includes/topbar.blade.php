<div class="topbar-main">
    <div class="container">

        <div class="logo">
            <a href="{{ route('panel') }}" class="logo"><i class="md md-equalizer"></i> <span>OceanProject</span> </a>
        </div>

        <ul class="nav navbar-nav">
            <li class="dropdown m-l-10">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">OceanID {{ Session::get('onBotEdit') }}<span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                    @foreach (Session::get('botsID') as $botid)
                        @if ($botid != Session::get('onBotEdit'))
                            <li><a href="{{ route('bot.setbotid', ['botid' => $botid]) }}">OceanID {{ $botid }}</a></li>
                        @endif
                    @endforeach
                    </ul>
            </li>
        </ul>

        <div class="menu-extras">

            <ul class="nav navbar-nav navbar-right pull-right">
                <li class="dropdown hidden-xs">
                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light"
                       data-toggle="dropdown" aria-expanded="true">
                        <i class="md md-notifications"></i> <span
                            class="badge badge-xs badge-pink">3</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg">
                        <li class="text-center notifi-title">Notification</li>
                        <li class="list-group nicescroll notification-list">
                            <a href="javascript:void(0);" class="list-group-item">
                                <div class="media">
                                    <div class="pull-left p-r-10">
                                        <em class="fa fa-diamond noti-primary"></em>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">A new order has been placed A new
                                            order has been placed</h5>
                                        <p class="m-0">
                                            <small>There are new settings available</small>
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="list-group-item">
                                <div class="media">
                                    <div class="pull-left p-r-10">
                                        <em class="fa fa-cog noti-warning"></em>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">New settings</h5>
                                        <p class="m-0">
                                            <small>There are new settings available</small>
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="list-group-item">
                                <div class="media">
                                    <div class="pull-left p-r-10">
                                        <em class="fa fa-bell-o noti-success"></em>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">Updates</h5>
                                        <p class="m-0">
                                            <small>There are <span class="text-primary">2</span> new
                                                updates available
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </a>

                        </li>

                        <li>
                            <a href="javascript:void(0);" class=" text-right">
                                <small><b>See all notifications</b></small>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="//i.imgur.com/rk9B7eA.jpg" alt="user-img" class="img-circle"> </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile') }}"><i class="ti-user m-r-5"></i> Profile</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ti-power-off m-r-5"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="menu-item">
                <a class="navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>