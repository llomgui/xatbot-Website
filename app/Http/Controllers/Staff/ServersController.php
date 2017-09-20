<?php

namespace OceanProject\Http\Controllers\Staff;

use Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use OceanProject\Http\Controllers\Controller;
use OceanProject\Models\Server;

class ServersController extends Controller
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

    public function showServers()
    {
        $server = DB::table('servers')
                ->paginate(25);
        return view('staff.serverslist')
                ->with('serversList', $server);
    }

    public function addServer(Request $request)
    {
        $data = $request->all();

        $rules = [
            'server' => 'max:255|required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['server'] = ucfirst(strtolower($data['server']));
        $checkServer = Server::where('name', $data['server'])->first();

        if (is_object($checkServer)) {
            return redirect()
                ->back()
                ->withError('This server is already added.');
        }

        $addServer = new Server;
        $addServer->name = $data['server'];
        $addServer->save();

        return redirect()
                ->back()
                ->withSuccess('Server added!');
    }

    public function editServer(Request $request)
    {
        $data = $request->all();
        $serverDatas = Server::find($data['server_id']);

        if (!is_object($serverDatas)) {
            return redirect()
                ->back()
                ->withError('This server does not exist!');
        }

        $rules = [
            'server' => 'max:255|required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['server'] = ucfirst(strtolower($data['server']));

        $serverDatas->name = $data['server'];
        $serverDatas->save();

        return redirect()
                ->back()
                ->withSuccess('Server updated!');
    }

    public function deleteServer(Request $request)
    {
        $data = $request->all();
        $serverDatas = Server::find($data['server_id']);

        if (!is_object($serverDatas)) {
            return response()->json(
                [
                    'status'  => 'error',
                    'message' => 'You are trying to cheat ! This server does not exist.',
                    'header'  => 'Error!'
                ]
            );
        }

        $serverDatas->delete();

        return response()->json(
            [
                'status'  => 'success',
                'message' => 'Server deleted!',
                'header'  => 'Deleted!'
            ]
        );
    }
}
