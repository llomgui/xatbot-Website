<?php

namespace OceanProject\Http\Controllers\Bot;

use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\Bot;
use OceanProject\Models\Alias;
use OceanProject\Http\Controllers\Controller;

class AliasController extends Controller
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

    public function showAliasForm()
    {
        $aliases = Bot::find(Session('onBotEdit'))->aliases;

        return view('bot.alias')->with('aliases', $aliases);
    }

    public function createAlias(Request $request)
    {
        $data = $request->all();

        $rules = [
            'command' => 'max:255|required',
            'alias'   => 'max:255|required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $alias = new Alias;

        $alias->bot_id  = Session('onBotEdit');
        $alias->command = $data['command'];
        $alias->alias   = $data['alias'];

        $alias->save();

        return redirect()
                ->back()
                ->withSuccess('Alias added!');
    }

    public function editAlias(Request $request)
    {
        $data = $request->all();

        $alias = Alias::find($data['alias_id']);

        if ($alias->aliasBot->id != Session('onBotEdit')) {
            return redirect()
                ->back()
                ->withError('You are trying to cheat!');
        }

        $rules = [
            'command' => 'max:255|required',
            'alias'   => 'max:255|required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $alias->command = $data['command'];
        $alias->alias   = $data['alias'];

        $alias->save();

        return redirect()
                ->back()
                ->withSuccess('Alias updated!');
    }

    public function deleteAlias(Request $request)
    {
        $data = $request->all();

        $alias = Alias::find($data['alias_id']);

        if ($alias->aliasBot->id != Session('onBotEdit')) {
            return response()->json(
                [
                'status' => 'error',
                'message' => 'You are trying to cheat, you do not own this alias!',
                'header' => 'Error!'
                ]
            );
        }

        $alias->delete();

        return response()->json(
            [
            'status' => 'success',
            'message' => 'Alias deleted!',
            'header' => 'Deleted!'
            ]
        );
    }
}
