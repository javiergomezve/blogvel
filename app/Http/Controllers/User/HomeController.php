<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\category;
use App\Model\User\Post;
use App\Model\User\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::where('status',1)->orderBy('created_at','DESC')->paginate(5);
    	return view('user.blog',compact('posts'));
    }
    public function tag(Tag $tag)
    {
        $posts = $tag->posts();
        return view('user.blog',compact('posts'));
    }

    public function category(category $category)
    {
        $posts = $category->posts();
        return view('user.blog',compact('posts'));
    }
}
