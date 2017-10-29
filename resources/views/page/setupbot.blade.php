@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Set up your bot</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="m-auto col-sm-6">
        <div class="card-box">
        <h4 class="m-t-0 header-title"><b>Set up your bot</b></h4>
        	<p class="text-muted m-b-30 font-13">How to set up your xatbot on your chat</p>
            <div class="text-left m-t-10">
				<p>1. Assign a (bot) power to your chat. To do so, type (bot) in the chat and click at the bot smiley and then on the “Assign” button.</p>
				<p>2. Click on the "Edit Your Chat" button and scroll down until you see the BOT power, Now check the box that's located on the left side of the BOT power and click on "Update these options" button.</p>
				<p>3. Scroll down again until you see the BOT power and click on the "Edit" button. A new window will open up and now simply add the xatbots ID to the Bot’s xat ID field, which is: 10101 and click “Ok”.</p>
				<img src="https://image.prntscr.com/image/DHe6xHKKS_SCblZGBOxLgA.jpeg">
				<br /><br />
				<p>4. Now click on the "Update these options" button again and we are finished for the chat setup part.</p>
				<p>5. As next create an account on our bot panel (<a href="{{ route('panel') }}">here</a>)</p>
				<p>6. Click at the “Create another button”.</p>
				<p>7. Add your chat name on the top left and the appearance Information of your bot and press the “Create!” button.</p>
				<img src="https://image.prntscr.com/image/K3TIZ8ViSdO5kkHSmKjzmQ.jpeg">
				<p>8. Lastly, start your bot, by clicking at the green play icon.</p>
				<p>9. We’re done, your bot should now connect to your chat.</p>
            </div>
        </div>
    </div>
</div>
@endsection