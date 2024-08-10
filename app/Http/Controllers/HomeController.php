<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        //get posts
        $posts = Post::query()
        ->select('title', 'body', 'user_id', 'created_at')
        ->with('photos:image','user:name', 'tags:name')
        ->get();

        //get banners   
        $banner = Banner::query()
        ->with('photo')
        ->whereHas('photo')
        ->inRandomorder()
        ->first();

        return view('home', [
            'posts' => $posts,
            'banner' => $banner
        ]);
    }
}
