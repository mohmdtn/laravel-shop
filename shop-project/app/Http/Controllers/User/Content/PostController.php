<?php

namespace App\Http\Controllers\User\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Comment;
use App\Models\Content\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(Post $post){
        $posts = Post::where("status", 1)->where("published_at", "<", Carbon::now())->latest()->take(10)->get();
        return view("user.content.post", compact("post", "posts"));
    }

    public function addComment(Request $request, Post $post){
        $request->validate([
            "body" => "required|min:2|max:800|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,# ]+$/u",
        ]);

        $inputs["body"]             = str_replace(PHP_EOL, "<br/>", $request["body"]);
        $inputs["author_id"]        = Auth::user()->id;
        $inputs["status"]           = 1;
        $inputs["commentable_id"]   = $post->id;
        $inputs["commentable_type"] = Post::class;

        Comment::create($inputs);

        return back();
    }

    public function posts(){
        $posts = Post::where("status", 1)->where("published_at", "<", Carbon::now())->latest()->take(10)->paginate(15);
        return view("user.content.posts", compact("posts"));
    }

}
