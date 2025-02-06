<?php

namespace App\Http\Controllers\Admin\tiktok;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class TikTokController extends Controller
{
    public function redirectToTikTok()
    {
        $clientKey = env('TIKTOK_CLIENT_KEY');
        $redirectUri = urlencode(env('TIKTOK_REDIRECT_URI'));
        $scope = 'user.info.basic,video.list,video.statistics';

        $codeVerifier = Str::random(64);
        Session::put('code_verifier', $codeVerifier);
        $codeChallenge = rtrim(strtr(base64_encode(hash('sha256', $codeVerifier, true)), '+/', '-_'), '=');

        $url = "https://www.tiktok.com/v2/auth/authorize/"
            . "?client_key={$clientKey}"
            . "&response_type=code"
            . "&scope={$scope}"
            . "&redirect_uri={$redirectUri}"
            . "&state=secure_state"
            . "&code_challenge={$codeChallenge}"
            . "&code_challenge_method=S256";

        return redirect($url);
    }



    public function handleCallback(Request $request)
    {
        $code = $request->query('code');
        if (!$code) {
            return redirect('/')->with('error', 'Authorization failed!');
        }

        // 🔥 استرجاع `code_verifier` من الجلسة
        $codeVerifier = Session::get('code_verifier');

        // 🔥 إرسال الطلب كـ JSON بشكل نظيف
        $response = Http::asJson()->post('https://open-api.tiktok.com/v2/oauth/token/', [
            'client_key' => env('TIKTOK_CLIENT_KEY'),
            'client_secret' => env('TIKTOK_CLIENT_SECRET'),
            'code' => $code,
            'grant_type' => 'authorization_code',
            'redirect_uri' => env('TIKTOK_REDIRECT_URI'),
            'code_verifier' => $codeVerifier
        ]);

        $data = $response->json();

        if (isset($data['access_token'])) {
            session(['tiktok_access_token' => $data['access_token']]);
            return redirect('/dashboard')->with('success', 'TikTok connected!');
        }

        return redirect('/')->with('error', 'Failed to retrieve access token.');
    }

    public function getUserVideos()
    {
        $accessToken = session('tiktok_access_token');

        if (!$accessToken) {
            return redirect('/')->with('error', 'Please connect to TikTok first.');
        }

        // 🔥 تأكد من أن `Authorization` لا يحتوي على أسطر جديدة
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . trim($accessToken),
        ])->get('https://open-api.tiktok.com/v2/video/list/');

        return $response->json();
    }

}
