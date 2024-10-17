<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use Illuminate\Http\Request;

class FrontPostController extends Controller
{
    private $name = "";
    private $viewName = "";
    private $routeName = "";
    private $mainTable = "";
    private $data = [];

    public function __construct()
    {
        $this->name = "Post";
    }

    public function allPublicPost(){

        $posts = Post::where('status',1)->latest();
        $this->data['objects'] = $posts->paginate(env('PAGINATION'))->appends(request()->query());
        $this->data['page_name'] = " All " . $this->name ;
        return view('front.index', $this->data);
    }
    public function singlePost(Post $post){


        if($post->status == 0){
            return redirect()->back()->with('error', $post->title . ' not Published Yet..');
        }
        if($post->status == 1){
            $this->data['object'] = $post;
            $this->data['page_name'] = $this->name . " Details" ;
            return view('admin.post.display', $this->data);
        }

    }
}
