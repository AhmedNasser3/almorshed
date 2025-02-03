<?php

namespace App\Http\Controllers\frontend\home;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\admin\review\Review;
use App\Http\Controllers\Controller;
use App\Models\admin\article\Article;

class HomeController extends Controller
{
    public function index(){
        $services = User::all();
        $articles = Article::all();
        return view('frontend.home.index',compact('articles','services'));
    }
    // services Controller
    public function services($ServicesId){
        $services = User::findOrFail($ServicesId);
        $reviews = Review::where('doctor_id', $ServicesId)->get();
        return view('frontend.pages.frontend.services.view',compact('reviews','services'));
    }
    // chat
    public function chat(){
        return view('frontend.pages.chats.chat');
    }
}
