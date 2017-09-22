<?php

namespace OceanProject\Http\Controllers\Staff;

use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use OceanProject\Http\Controllers\Controller;
use OceanProject\Models\Minrank;
use OceanProject\Models\Command;

class CommandsController extends Controller
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

    public function showCommands()
    {
        $commands = Command::orderBy('name', 'asc')->paginate(25);
        $minranksList = Minrank::pluck('name', 'level')->toArray();
        return view('staff.commandslist')
                ->with('commands', $commands)
                ->with('minranks', $minranksList);
    }

    public function addCommand(Request $request)
    {
        $data = $request->all();

        $rules = [
            'command' => 'max:255|required',
            'description' => 'max:255'
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(
            function ($validator) use ($data) {
                if (!in_array($data['minrank'], Minrank::pluck('level')->toArray())) {
                    $validator->errors()->add('minrank', 'This minrank is not valid!');
                }
            }
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['command'] = strtolower($data['command']);
        $checkCommand = Command::where('name', $data['command'])->first();

        if (is_object($checkCommand)) {
            return redirect()
                ->back()
                ->withError('This command is already added.');
        }

        $newCommand = new Command;
        $newCommand->name = $data['command'];
        $newCommand->description = (!empty($data['description']) ? $data['description'] : '');
        $newCommand->default_level = $data['minrank'];
        $newCommand->save();

        return redirect()
            ->back()
            ->withSuccess('Command added!');
    }

    public function editCommand(Request $request)
    {
        $data = $request->all();
        $commandDatas = Command::find($data['command_id']);

        if (!is_object($commandDatas)) {
            return redirect()
                ->back()
                ->withError('This command does not exist!');
        }

        $rules = [
            'command' => 'max:255|required',
            'description' => 'max:255'
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(
            function ($validator) use ($data) {
                if (!in_array($data['minrank'], Minrank::pluck('level')->toArray())) {
                    $validator->errors()->add('minrank', 'This minrank is not valid!');
                }
            }
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['command'] = strtolower($data['command']);

        $commandDatas->name = $data['command'];
        $commandDatas->description = (!empty($data['description']) ? $data['description'] : '');
        $commandDatas->default_level = $data['minrank'];
        $commandDatas->save();

        return redirect()
            ->back()
            ->withSuccess('Command updated!');
    }

    public function deleteCommand(Request $request)
    {
        $data = $request->all();
        $commandDatas = Command::find($data['command_id']);

        if (!is_object($commandDatas)) {
            return response()->json(
                [
                    'status'  => 'error',
                    'message' => 'You are trying to cheat ! This command does not exist.',
                    'header'  => 'Error!'
                ]
            );
        }

        $commandDatas->delete();

        return response()->json(
            [
                'status'  => 'success',
                'message' => 'Command deleted!',
                'header'  => 'Deleted!'
            ]
        );
    }
}
