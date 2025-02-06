<?php

namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterService
{
    protected $twitter;

    public function __construct()
    {
        $this->twitter = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_ACCESS_TOKEN_SECRET')
        );
    }

    // نشر تغريدة
    public function postTweet($message)
    {
        return $this->twitter->post("statuses/update", ["status" => $message]);
    }

    // جلب إحصائيات التغريدات
    public function getUserTimeline($count = 10)
    {
        return $this->twitter->get("statuses/user_timeline", ["count" => $count]);
    }

}