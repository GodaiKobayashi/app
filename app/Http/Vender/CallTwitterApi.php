<?php

namespace App\Http\Vender;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;


class callTwitterApi
{
    
    private $token;
    
    public function __construct()
    {
        $this->token = new TwitterOAuth(
            config('services.twitter.client_id'),
            config('services.twitter.client_secret'),
            config('services.twitter.access_token'),
            config('services.twitter.access_token_secret')
        );
    }
    
    // ツイート検索
    public function serachTweets(String $searchWord)
    {
        $tweets = $this->token->get("search/tweets", [
            'q' => $searchWord,
            'count' => 5,
         ]);
         
        return $tweets->statuses;
    }
}