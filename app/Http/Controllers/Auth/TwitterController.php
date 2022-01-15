<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Vender\CallTwitterApi;
use Illuminate\Support\Facades\Auth;

class TwitterController extends Controller
{

    public function index(String $keyword)
    {
        $token = new CallTwitterApi();
        $search = $token->serachTweets($keyword);

        return $search;
    }
    public function twitter(String $keyword)
    {
        $token = new CallTwitterApi();
        $search = $token->serachTweets($keyword);
        
        return $search;
    }
}
