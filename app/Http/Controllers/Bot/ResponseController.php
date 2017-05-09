<?php

namespace OceanProject\Http\Controllers\Bot;

use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\Bot;
use OceanProject\Models\Response;
use OceanProject\Http\Controllers\Controller;

class ResponseController extends Controller
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

    public function showResponseForm()
    {
        $responses = Bot::find(Session('onBotEdit'))->responses;

        return view('bot.response')->with('responses', $responses);
    }

    public function createResponse(Request $request)
    {
        $data = $request->all();

        $rules = [
            'phrase'   => 'max:255|required',
            'response' => 'max:255|required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $response = new Response;

        $response->bot_id   = Session('onBotEdit');
        $response->phrase   = $data['phrase'];
        $response->response = $data['response'];

        $response->save();

        return redirect()
                ->back()
                ->withSuccess('Response added!');
    }

    public function editResponse(Request $request)
    {
        $data = $request->all();

        $response = Response::find($data['response_id']);

        if ($response->response_bot->id != Session('onBotEdit')) {
            return redirect()
                ->back()
                ->withError('You are trying to cheat!');
        }

        $rules = [
            'phrase'   => 'max:255|required',
            'response' => 'max:255|required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $response->phrase   = $data['phrase'];
        $response->response = $data['response'];

        $response->save();

        return redirect()
                ->back()
                ->withSuccess('Response updated!');
    }

    public function deleteResponse(Request $request)
    {
        $data = $request->all();

        $response = Response::find($data['response_id']);

        if ($response->response_bot->id != Session('onBotEdit')) {
            return response()->json([
                'status'  => 'error',
                'message' => 'You are trying to cheat, you do not own this response!',
                'header'  => 'Error!'
            ]);
        }

        $response->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Response deleted!',
            'header'  => 'Deleted!'
        ]);
    }
}
