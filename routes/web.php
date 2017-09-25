<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Landing'], function() {
    Route::get('/', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'panel'], function () {

    Route::group(['middleware' => 'auth', 'namespace' => 'Page'], function () {

        Route::get('home', 'HomeController@index')->name('panel');
        Route::get('chat', 'ChatController@index')->name('chat');
        Route::get('servers', 'ServersController@index')->name('servers');
        Route::get('commands/{botid?}', 'CommandsController@index')->name('commands');
        Route::get('userinfo/{user?}', 'UserinfoController@index')->name('userinfo');
        Route::get('everymissing/{user?}', 'EverymissingController@index')->name('everymissing');
        Route::get('allmissing/{user?}', 'AllmissingController@index')->name('allmissing');
        Route::get('oceanstaff', 'StaffController@index')->name('oceanstaff');

    });

    Route::group(['prefix' => 'bot', 'middleware' => ['auth', 'hasbot'], 'namespace' => 'Bot'], function () {

        Route::post('create', 'CreateController@store')->name('bot.create');
        Route::post('editnickname', 'EditController@editNickname')->name('bot.editnickname');
        Route::get('setbotid/{botid}', 'BotController@setBotID')->name('bot.setbotid');
        Route::get('edit', 'EditController@showEditForm')->name('bot.edit');
        Route::post('edit', 'EditController@edit')->name('bot.edit');

        Route::get('staff', 'StaffController@showStaffForm')->name('bot.staff');
        Route::post('createstaff', 'StaffController@createStaff')->name('bot.createstaff');
        Route::post('editstaff', 'StaffController@editStaff')->name('bot.editstaff');
        Route::post('deletestaff', 'StaffController@deleteStaff')->name('bot.deletestaff');

        Route::get('autotemp', 'AutoTempController@showAutoTempForm')->name('bot.autotemp');
        Route::post('createautotemp', 'AutoTempController@createAutoTemp')->name('bot.createautotemp');
        Route::post('editautotemp', 'AutoTempController@editAutoTemp')->name('bot.editautotemp');
        Route::post('deleteautotemp', 'AutoTempController@deleteAutoTemp')->name('bot.deleteautotemp');

        Route::get('snitch', 'SnitchController@showSnitchForm')->name('bot.snitch');
        Route::post('createsnitch', 'SnitchController@createSnitch')->name('bot.createsnitch');
        Route::post('editsnitch', 'SnitchController@editSnitch')->name('bot.editsnitch');
        Route::post('deletesnitch', 'SnitchController@deleteSnitch')->name('bot.deletesnitch');

        Route::get('alias', 'AliasController@showAliasForm')->name('bot.alias');
        Route::post('createalias', 'AliasController@createAlias')->name('bot.createalias');
        Route::post('editalias', 'AliasController@editAlias')->name('bot.editalias');
        Route::post('deletealias', 'AliasController@deleteAlias')->name('bot.deletealias');

        Route::get('reponse', 'ResponseController@showResponseForm')->name('bot.response');
        Route::post('createresponse', 'ResponseController@createResponse')->name('bot.createresponse');
        Route::post('editresponse', 'ResponseController@editResponse')->name('bot.editresponse');
        Route::post('deleteresponse', 'ResponseController@deleteResponse')->name('bot.deleteresponse');

        Route::get('autoban', 'AutoBanController@showAutoBanForm')->name('bot.autoban');
        Route::post('createautoban', 'AutoBanController@createAutoBan')->name('bot.createautoban');
        Route::post('editautoban', 'AutoBanController@editAutoBan')->name('bot.editautoban');
        Route::post('deleteautoban', 'AutoBanController@deleteAutoBan')->name('bot.deleteautoban');

        Route::get('link', 'LinkFilterController@showLinkForm')->name('bot.link');
        Route::post('createlink', 'LinkFilterController@createLink')->name('bot.createlink');
        Route::post('editlink', 'LinkFilterController@editLink')->name('bot.editlink');
        Route::post('deletelink', 'LinkFilterController@deleteLink')->name('bot.deletelink');

        Route::get('badword', 'BadwordController@showBadwordForm')->name('bot.badword');
        Route::post('createbadword', 'BadwordController@createBadword')->name('bot.createbadword');
        Route::post('editbadword', 'BadwordController@editBadword')->name('bot.editbadword');
        Route::post('deletebadword', 'BadwordController@deleteBadword')->name('bot.deletebadword');

        Route::get('customcmd', 'CustomCmdController@showCustomCmdForm')->name('bot.customcmd');
        Route::post('createcustomcmd', 'CustomCmdController@createCustomcmd')->name('bot.createcustomcmd');
        Route::post('editcustomcmd', 'CustomCmdController@editCustomcmd')->name('bot.editcustomcmd');
        Route::post('deletecustomcmd', 'CustomCmdController@deleteCustomcmd')->name('bot.deletecustomcmd');

        Route::get('minrank', 'MinrankController@showMinrankForm')->name('bot.minrank');
        Route::post('editminrank', 'MinrankController@editMinrank')->name('bot.editminrank');

        Route::get('botlang', 'BotlangController@showBotlangForm')->name('bot.botlang');
        Route::post('editbotlang', 'BotlangController@editBotlang')->name('bot.editbotlang');

        Route::get('powers', 'PowersController@showPowersForm')->name('bot.powers');
        Route::post('powers', 'PowersController@editPowers')->name('bot.editpowers');

        Route::post('actionbot', 'BotController@actionBot')->name('bot.actionbot');

        Route::get('logs/{botid}/{amount?}', 'BotController@showLogs')->name('bot.logs');

        Route::get('sharebot', 'ShareBotController@showList')->name('sharebot');
        Route::post('sharebot', 'ShareBotController@addAccess')->name('postsharebot');
        Route::post('delsharebot', 'ShareBotController@deleteAccess')->name('deleteaccess');

    });

    Route::group(['prefix' => 'support', 'middleware' => 'auth', 'namespace' => 'Support'], function () {
        
        Route::get('list', 'TicketController@showList')->name('support.list');
        Route::get('ticket/{id}', 'TicketController@showTicket')->name('support.ticket');
        Route::post('createticket', 'TicketController@create')->name('support.createticket');
        Route::post('replyticket', 'TicketController@reply')->name('support.replyticket');

    });

    Route::group(['prefix' => 'staff', 'middleware' => ['auth', 'level:3'], 'namespace' => 'Staff'], function () {

        Route::get('users', 'UsersController@showUsers')->name('staff.users');
        Route::get('edituser/{user}', 'UsersController@showEditUser')->name('staff.edituser');
        Route::post('edituser', 'UsersController@editUser')->name('staff.postedituser');

        Route::get('bots', 'BotsController@showBots')->name('staff.bots');
        Route::post('actionbot', 'BotsController@actionBot')->name('staff.actionbot');


        Route::group(['middleware' => 'role:admin'], function () {

            Route::get('botmessages', 'BotMessagesController@showBotMessages')->name('staff.botmessages');
            Route::post('addmessage', 'BotMessagesController@addBotMessages')->name('staff.addbotmessages');
            Route::post('editmessage', 'BotMessagesController@editBotMessages')->name('staff.editbotmessages');
            Route::post('deletemessage', 'BotMessagesController@deleteBotMessages')->name('staff.deletebotmessages');

            Route::get('commands', 'CommandsController@showCommands')->name('staff.commands');
            Route::post('editcommand', 'CommandsController@editCommand')->name('staff.editcommand');
            Route::post('addcommand', 'CommandsController@addCommand')->name('staff.addcommand');
            Route::post('deletecommand', 'CommandsController@deleteCommand')->name('staff.deletecommand');

            Route::get('servers', 'ServersController@showServers')->name('staff.servers');
            Route::post('editserver', 'ServersController@editServer')->name('staff.editserver');
            Route::post('addserver', 'ServersController@addServer')->name('staff.addserver');
            Route::post('deleteserver', 'ServersController@deleteServer')->name('staff.deleteserver');
            
        });

        Route::get('tickets', 'TicketController@showList')->name('staff.tickets');
        Route::get('ticket/{ticketid}', 'TicketController@showTicket')->name('staff.ticket');
        Route::post('replyticket', 'TicketController@reply')->name('staff.replyticket');
        Route::post('closeticket', 'TicketController@close')->name('staff.closeticket');

    });

    Route::group(['prefix' => 'user', 'namespace' => 'Auth'], function () {

        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login')->name('login');

        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');

        Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');;

        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register')->name('register');

        Route::get('profile', 'ProfileController@showUpdateForm')->name('profile');
        Route::post('profile', 'ProfileController@update')->name('profile');

    });
});
