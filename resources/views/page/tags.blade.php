@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-8">
        <div class="page-title-box">
            <h4 class="page-title">Tags</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="m-auto col-sm-8">
        <div class="card-box">
            <h4 class="m-t-0 header-title">List of tags</h4>
            <p class="text-muted font-14 m-b-20">
                You can use those tags in bot's name/status, autowelcome, response, custom commands. You can suggest more via <a href="{{ route('support.list') }}">Ticket</a>.
            </p>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{name}</td>
                            <td>Bot gives the nickname of the user who sent the command/joined the chat.</td>
                        </tr>
                        <tr>
                            <td>{status}</td>
                            <td>Bot gives the status of the user who sent the command/joined the chat.</td>
                        </tr>
                        <tr>
                            <td>{regname}</td>
                            <td>Bot gives the regname of the user who sent the command/joined the chat.</td>
                        </tr>
                        <tr>
                            <td>{id}</td>
                            <td>Bot gives the id of the user who sent the command/joined the chat.</td>
                        </tr>
                        <tr>
                            <td>{users} / {online}</td>
                            <td>Bot gives the amount of users online in the chat.</td>
                        </tr>
                        <tr>
                            <td>{cmdcode} / {command} / {cc}</td>
                            <td>Bot gives the current command code to use commands.</td>
                        </tr>
                        <tr>
                            <td>{randomuser}</td>
                            <td>Bot gives a random user's regname online in the chat.</td>
                        </tr>
                        <tr>
                            <td>{randomname}</td>
                            <td>Bot gives a random user's nick online in the chat.</td>
                        </tr>
                        <tr>
                            <td>{randomid}</td>
                            <td>Bot gives a random user's id online in the chat.</td>
                        </tr>
                        <tr>
                            <td>{randomnumber}</td>
                            <td>Bot gives a random number between 1 - 1000.</td>
                        </tr>
                        <tr>
                            <td>{latestpower}</td>
                            <td>Bot gives the last power's name.</td>
                        </tr>
                        <tr>
                            <td>{latestpowerid}</td>
                            <td>Bot gives the last power's id.</td>
                        </tr>
                        <tr>
                            <td>{latestpowerstoreprice}</td>
                            <td>Bot gives the last power's store price.</td>
                        </tr>
                        <tr>
                            <td>{latestpowertradeprice}</td>
                            <td>Bot gives the last power's trade price.</td>
                        </tr>
                        <tr>
                            <td>{latestpowerstatus}</td>
                            <td>Bot gives the last power's status (Unreleased/Unlimited/Limited).</td>
                        </tr>

                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>
@endsection