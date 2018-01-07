<?php

namespace xatbot\Http\Controllers\Bot;

use Validator;
use Illuminate\Http\Request;
use xatbot\Models\Bot;
use xatbot\Models\LinkFilter;
use xatbot\Http\Controllers\Controller;

class LinkFilterController extends Controller
{
    public function showLinkForm()
    {
        $links = Bot::find(Session('onBotEdit'))->linksfilter;

        return view('bot.linkfilter')
            ->with('links', $links);
    }

    public function createLink(Request $request)
    {
        $data = $request->all();

        $rules = [
            'link' => 'max:255|required',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $link = new LinkFilter;

        $link->bot_id = Session('onBotEdit');
        $link->link = strtolower(str_replace(['http://', 'https://'], '', $data['link']));

        $link->save();

        return redirect()
            ->back()
            ->withSuccess('Link added!');
    }

    public function editLink(Request $request)
    {
        $data = $request->all();

        $link = LinkFilter::find($data['link_id']);

        if ($link->linkFilterBot->id != Session('onBotEdit')) {
            return redirect()
                ->back()
                ->withError('You are trying to cheat!');
        }

        $rules = [
            'link' => 'max:255|required',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $link->link = strtolower(str_replace(['http://', 'https://'], '', $data['link']));

        $link->save();

        return redirect()
            ->back()
            ->withSuccess('Link updated!');
    }

    public function deleteLink(Request $request)
    {
        $data = $request->all();

        $link = LinkFilter::find($data['link_id']);

        if ($link->linkFilterBot->id != Session('onBotEdit')) {
            return response()->json(
                [
                    'status'  => 'error',
                    'message' => 'You are trying to cheat, you do not own this badword!',
                    'header'  => 'Error!'
                ]
            );
        }

        $link->delete();

        return response()->json(
            [
                'status'  => 'success',
                'message' => 'Link deleted!',
                'header'  => 'Deleted!'
            ]
        );
    }
}
