<?php

namespace OceanProject\Http\Controllers\Auth;

use Auth;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use OceanProject\Models\User;
use OceanProject\Http\Controllers\Controller;

class SpotifyController extends Controller
{
    public $spotifySession = null;
    public $spotifyOptions = null;

    public function __construct()
    {
        $this->middleware('auth');
        $this->spotifySession = new \SpotifyWebAPI\Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_SECRET_ID'),
            env('SPOTIFY_REDIRECT_URI')
        );

        $this->spotifyOptions = [
            'scope' => [
                'user-read-currently-playing',
                'user-read-playback-state',
            ],
            'state' => str_random(30)
        ];
    }

    public function authorizeSpotify()
    {
        $user = Auth::user();
        $user->spotify = [];
        $user->spotify = array_merge($user->spotify, ['state' => $this->spotifyOptions['state']]);
        $user->save();
        header('Location: ' . $this->spotifySession->getAuthorizeUrl($this->spotifyOptions));
        die();
    }

    public function callback()
    {
        $user = Auth::user();
        if (isset($user->spotify['state']) && $user->spotify['state'] == $_GET['state']) {
            $this->spotifySession->requestAccessToken($_GET['code']);
            $accessToken = $this->spotifySession->getAccessToken();
            $refreshToken = $this->spotifySession->getRefreshToken();
            
            $user->spotify = ['accessToken' => $accessToken, 'refreshToken' => $refreshToken];
            $user->save();

            return redirect()
                ->route('profile')
                ->withSuccess('Congratulations, your account is linked to Spotify!');
        }

        abort(404, 'CRSF');
    }

    public function logout()
    {
        $user = Auth::user();
        $user->spotify = [];
        $user->save();

        return redirect()
                ->route('profile')
                ->withSuccess('Spotify is now removed from your account!');
    }
}
