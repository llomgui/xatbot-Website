<?php

namespace OceanProject\Http\Controllers\Staff;

use Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use OceanProject\Http\Controllers\Controller;
use OceanProject\Models\Language;

class LanguagesController extends Controller
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

    public function showLanguages()
    {
        $language = Language::orderby('id', 'asc')
                ->paginate(25);
        return view('staff.languageslist')
                ->with('languagesList', $language);
    }

    public function addLanguage(Request $request)
    {
        $data = $request->all();

        $rules = [
            'language' => 'max:255|required',
            'code' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['language'] = ucfirst(strtolower($data['language']));
        $checkLanguage = Language::where('name', $data['language'])->first();

        if (is_object($checkLanguage)) {
            return redirect()
                ->back()
                ->withError('This language is already added.');
        }

        $addLanguage = new Language;
        $addLanguage->name = $data['language'];
        $addLanguage->code = $data['code'];
        $addLanguage->save();

        return redirect()
                ->back()
                ->withSuccess('Language added!');
    }

    public function editLanguage(Request $request)
    {
        $data = $request->all();
        $languageDatas = Language::find($data['language_id']);

        if (!is_object($languageDatas)) {
            return redirect()
                ->back()
                ->withError('This language does not exist!');
        }

        $rules = [
            'language' => 'max:255|required',
            'code' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['language'] = ucfirst(strtolower($data['language']));

        $languageDatas->name = $data['language'];
        $languageDatas->code = $data['code'];
        $languageDatas->save();

        return redirect()
                ->back()
                ->withSuccess('Language updated!');
    }
}
