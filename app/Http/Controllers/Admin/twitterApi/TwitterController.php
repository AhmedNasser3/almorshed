<?php

namespace App\Http\Controllers\admin\twitterApi;

use Illuminate\Http\Request;
use App\Services\TwitterService;
use App\Http\Controllers\Controller;

class TwitterController extends Controller
{
    protected $twitterService;

    public function __construct(TwitterService $twitterService)
    {
        $this->twitterService = $twitterService;
    }
    // نشر تغريدة جديدة
    public function postTweet(Request $request)
    {
        $message = $request->input('message');
        $response = $this->twitterService->postTweet($message);

        return response()->json([
            'success' => true,
            'message' => 'تم إرسال التغريدة بنجاح!',
            'twitter_response' => $response
        ]);
    }

    // عرض أحدث التغريدات
    public function getTweets()
    {
        $tweets = $this->twitterService->getUserTimeline();
        return response()->json($tweets);
    }
}