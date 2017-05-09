<?php

namespace OceanProject\Http\Controllers\Bot;

use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\Bot;
use OceanProject\Models\Badword;
use OceanProject\Http\Controllers\Controller;

class BadwordController extends Controller
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

    public function showBadwordForm()
    {
        $badwords = Bot::find(Session('onBotEdit'))->badwords;
        $methods  = [
            'kick' => 'Kick',
            'ban' => 'Ban',
            'dunce' => 'Dunce',
            'zap' => 'Zap',
            'reverse' => 'Reverse',
            'yellowcard' => 'Yellowcard',
            'badge' => 'Badge',
            'zip' => 'Zip',
            'naughtystep' => 'Naughtystep',
            'snakeban' => 'Snakeban',
            'spaceban' => 'Spaceban',
            'matchban' => 'Matchban',
            'codeban' => 'Codeban',
            'mazeban' => 'Mazeban',
            'slotban' => 'Slotban'
        ];

        return view('bot.badword')
            ->with('methods', $methods)
            ->with('badwords', $badwords);
    }

    public function createBadword(Request $request)
    {
        $data = $request->all();

        $rules = [
            'method'  => 'max:255|required',
            'badword' => 'max:255|required',
            'hours'   => 'integer'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $badword = new Badword;

        $badword->bot_id  = Session('onBotEdit');
        $badword->method  = $data['method'];
        $badword->badword = $data['badword'];
        $badword->hours   = $data['hours'];

        $badword->save();

        return redirect()
                ->back()
                ->withSuccess('Badword added!');
    }

    public function editBadword(Request $request)
    {
        $data = $request->all();

        $badword = Badword::find($data['badword_id']);

        if ($badword->badword_bot->id != Session('onBotEdit')) {
            return redirect()
                ->back()
                ->withError('You are trying to cheat!');
        }

        $rules = [
            'method'  => 'max:255|required',
            'badword' => 'max:255|required',
            'hours'   => 'integer'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $badword->method  = $data['method'];
        $badword->badword = $data['badword'];
        $badword->hours   = $data['hours'];

        $badword->save();

        return redirect()
                ->back()
                ->withSuccess('Badword updated!');
    }

    public function deleteBadword(Request $request)
    {
        $data = $request->all();

        $badword = Badword::find($data['badword_id']);

        if ($badword->badword_bot->id != Session('onBotEdit')) {
            return response()->json([
                'status'  => 'error',
                'message' => 'You are trying to cheat, you do not own this badword!',
                'header'  => 'Error!'
            ]);
        }

        $badword->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Badword deleted!',
            'header'  => 'Deleted!'
        ]);
    }
}
