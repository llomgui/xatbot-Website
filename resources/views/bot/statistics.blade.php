@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Statistics</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="m-auto col-sm-8">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Staff Activity list</h4>
            <p class="text-muted font-14 m-b-20">This is the list of your staff and their activity during the last 30 days.</p>

            <ul class="nav nav-tabs tabs-bordered">
                <li class="nav-item">
                    <a href="#hours24" data-toggle="tab" aria-expanded="false" class="nav-link">
                        24 hours
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#days7" data-toggle="tab" aria-expanded="true" class="nav-link active">
                        7 days
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#days30" data-toggle="tab" aria-expanded="false" class="nav-link">
                        30 days
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#allTime" data-toggle="tab" aria-expanded="false" class="nav-link">
                        All time
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade" id="hours24">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Rank</th>
                                <th>Messages</th>
                                <th>Events</th>
                                <th>Total time spent</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($statistics24Hours as $statistics24Hour)
                            <tr>
                                <td>{{$statistics24Hour->regname}} ({{$statistics24Hour->xatid}})</td>
                                <td>
                                @if ($statistics24Hour->rank == 2)
                                    <img src="/images/pawns/member.png">
                                @elseif ($statistics24Hour->rank == 3)
                                    <img src="/images/pawns/moderator.png">
                                @elseif ($statistics24Hour->rank >= 4)
                                    <img src="/images/pawns/owner.png">
                                @endif
                                </td>
                                <td>{{$statistics24Hour->messages}}</td>
                                <td>{{$statistics24Hour->events}}</td>
                                <td>{{$statistics24Hour->time_spent}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade show active" id="days7">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Rank</th>
                                <th>Messages</th>
                                <th>Events</th>
                                <th>Total time spent</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($statistics7Days as $statistics7Day)
                            <tr>
                                <td>{{$statistics7Day->regname}} ({{$statistics7Day->xatid}})</td>
                                <td>
                                @if ($statistics7Day->rank == 2)
                                    <img src="/images/pawns/member.png">
                                @elseif ($statistics7Day->rank == 3)
                                    <img src="/images/pawns/moderator.png">
                                @elseif ($statistics7Day->rank >= 4)
                                    <img src="/images/pawns/owner.png">
                                @endif
                                </td>
                                <td>{{$statistics7Day->messages}}</td>
                                <td>{{$statistics7Day->events}}</td>
                                <td>{{$statistics7Day->time_spent}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="days30">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Rank</th>
                                <th>Messages</th>
                                <th>Events</th>
                                <th>Total time spent</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($statistics30Days as $statistic30Day)
                            <tr>
                                <td>{{$statistic30Day->regname}} ({{$statistic30Day->xatid}})</td>
                                <td>
                                @if ($statistic30Day->rank == 2)
                                    <img src="/images/pawns/member.png">
                                @elseif ($statistic30Day->rank == 3)
                                    <img src="/images/pawns/moderator.png">
                                @elseif ($statistic30Day->rank >= 4)
                                    <img src="/images/pawns/owner.png">
                                @endif
                                </td>
                                <td>{{$statistic30Day->messages}}</td>
                                <td>{{$statistic30Day->events}}</td>
                                <td>{{$statistic30Day->time_spent}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="allTime">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Rank</th>
                                <th>Messages</th>
                                <th>Events</th>
                                <th>Total time spent</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($statisticsAllTime as $statisticAllTime)
                            <tr>
                                <td>{{$statisticAllTime->regname}} ({{$statisticAllTime->xatid}})</td>
                                <td>
                                @if ($statisticAllTime->rank == 2)
                                    <img src="/images/pawns/member.png">
                                @elseif ($statisticAllTime->rank == 3)
                                    <img src="/images/pawns/moderator.png">
                                @elseif ($statisticAllTime->rank >= 4)
                                    <img src="/images/pawns/owner.png">
                                @endif
                                </td>
                                <td>{{$statisticAllTime->messages}}</td>
                                <td>{{$statisticAllTime->events}}</td>
                                <td>{{$statisticAllTime->time_spent}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!--<table class="table table-hover">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Rank</th>
                        <th>Messages</th>
                        <th>Events</th>
                        <th>Total time spent</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($statistics30Days as $statistic30Day)
                    <tr>
                        <td>{{$statistic30Day->regname}} ({{$statistic30Day->xatid}})</td>
                        <td>
                        @if ($statistic30Day->rank == 2)
                            <img src="/images/pawns/member.png">
                        @elseif ($statistic30Day->rank == 3)
                            <img src="/images/pawns/moderator.png">
                        @elseif ($statistic30Day->rank >= 4)
                            <img src="/images/pawns/owner.png">
                        @endif
                        </td>
                        <td>{{$statistic30Day->messages}}</td>
                        <td>{{$statistic30Day->events}}</td>
                        <td>{{$statistic30Day->time_spent}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        -->
        </div>
    </div>
</div>
@endsection

@section('footer')

@endsection