<?php

namespace OceanProject\Http\Controllers\Bot;

use Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OceanProject\Models\Bot;
use OceanProject\Models\User;
use OceanProject\Http\Controllers\Controller;

class ShareBotController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showList()
    {
        $bot = Bot::find(Session('onBotEdit'));
        $users = $bot->users()->get();
        return view('bot.sharebot')
            ->with('usersList', $users);
    }

    public function addAccess(Request $request)
    {
        $data = $request->all();
        $currentUser = \Auth::user();

        $rules = [
            'share_key' => 'max:255|required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $bot = Bot::find(Session('onBotEdit'));
        $users = $bot->users()->get();
        $checkKey = User::where('share_key', $data['share_key'])->get();
        
        if (count($checkKey) == 0) {
            return redirect()
                    ->back()
                    ->withError('This key does not exist or is empty!');
        }

        $userSelected = null;
        foreach ($checkKey as $datas) {
            if ($datas->id == $currentUser->id) {
                return redirect()
                    ->back()
                    ->withError('You can\'t add yourself to your own bot!');
            }
            $userSelected = $datas;
        }

        foreach ($users as $user) {
            if ($user->regname == $userSelected->regname) {
                return redirect()
                    ->back()
                    ->withError('This user is already added to this bot!');
            }
        }

        $user = User::find($userSelected->id);
        $bot->users()->save($user);
        return redirect()
                ->back()
                ->withSuccess('The user has been added to this bot.');
    }

    public function deleteAccess(Request $request)
    {
        $data = $request->all();
        $bot = Bot::find(Session('onBotEdit'));
        $users = $bot->users()->get();

        foreach ($users as $user) {
            if ($user->id == $data['user_id']) {
                DB::table('bot_user')
                    ->where('user_id', '=', $data['user_id'])
                    ->delete();
                return response()->json(
                    [
                        'status'  => 'success',
                        'message' => 'The user has been removed from the list.',
                        'header'  => 'Success!'
                    ]
                );
            }
        }

        return response()->json(
            [
                'status'  => 'error',
                'message' => 'You are trying to cheat, this user is not added!',
                'header'  => 'Error!'
            ]
        );
    }
}
