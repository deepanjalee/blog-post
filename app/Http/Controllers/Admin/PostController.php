<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Admin\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class PostController extends Controller
{

    private $name = "";
    private $viewName = "";
    private $routeName = "";
    private $mainTable = "";
    private $data = [];

    public function __construct(Post $post)
    {

        $this->name = "Post";
        $this->viewName = "admin.post";
        $this->routeName = "admin.posts";
        $this->mainTable = $post;
    }


    public function index(Request $request)
    {
        $auth_user = Auth::user();
        $posts = Post::latest();

        if ($request->title != "" && $request->has('title')) {
            $posts = $posts->where('title', 'like', "%" . $request->title . "%");
        }
        $this->data['auth_user'] = $auth_user;
        $this->data['objects'] = $posts->paginate(env('PAGINATION'))->appends(request()->query());
        $this->data['page_name'] = $this->name . " Manage";
        $this->data['btn_name'] = $this->name . " Add";
        $this->data['btn_route_edit'] = $this->routeName . '.show';
        $this->data['btn_route_delete'] = $this->routeName . '.destroy';
        $this->data['btn_route'] = route($this->routeName . '.create');
        return view($this->viewName . '.index', $this->data);
    }

    public function create()
    {
        $this->data['update'] = false;
        $this->data['object'] = $this->mainTable;
        $this->data['route'] = route($this->routeName . '.store');
        $this->data['page_name'] = $this->name . " Add";
        return view($this->viewName . '.form', $this->data);
    }

    public function store(PostRequest $request)
    {
        $user = Auth::user();
        if ($user != null) {
            $user_id = $user->id;
            $created_by =  $user_id;
            $updated_by =  $user_id;

            $request['created_by'] =  $created_by;
            $request['updated_by'] =  $updated_by;
            $object = Post::create($request->all());
        }
        // dd($request->all());


        return redirect(route($this->routeName . '.index'))->with('status', $this->name . 'Added Successfully.');
    }
    public function uploadImage(Request $request)
    {
        // dd();
        if ($request->hasFile('upload')) {
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extention = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . "_" . time() . "." . $extention;

            $request->file('upload')->move(public_path('media'), $fileName);
            $url = asset('media/' . $fileName);
            return response()->json([
                'file_name' =>  $fileName,
                'uploaded' => true,
                'url' => $url
            ]);
        }
    }

    public function show(Post $post)
    {
        $this->data['object'] = $post;
        $this->data['page_name'] = $this->name . " Update";
        $this->data['route'] = route($this->routeName . '.update', $post);
        $this->data['update'] = true;
        return view($this->viewName . '.form', $this->data);
    }
    public function displayPost(Post $post)
    {
        $this->data['object'] = $post;
        $this->data['page_name'] = $this->name . " Update";
        $this->data['route'] = route($this->routeName . '.update', $post);
        $this->data['update'] = true;
        return view($this->viewName . '.display', $this->data);
    }
    public function changeStatus(Request $request)
    {
       $success = true;
       $message = "";
        try {
            $user_id = Auth::id();
            $status = $request->status;
            $id = $request->id;
            $post = Post::find( $id);
            if($post != null){
                $post->status = $status;
                $lable = ($status == 1) ? "Published" : "Pending";
                if($status == 1){
                    $post->published_by =  $user_id;
                    $post->published_at =  Carbon::now();
                    $message = "Post Published Succesfully";


                }
                if($status == 0){
                    $post->published_by =  null;
                    $post->published_at =  null;
                    $message = "Post Status Changes to Pending.";

                }
                $post->save();



            }
            if($post == null){
                $success = false;
                $message = "Post Not Found";

            }

            return response()->json([
                'success' =>  $success ,
                'message' =>  $message,
                'lable' =>  $lable ,
            ]);

            // dd( $post );
        } catch (\Exception $exception) {
            Log::channel('post_log')->info("user destroy() Exception -----------  " . $exception->getMessage() . ' - line - ' . $exception->getLine() . ' - file --- ' . $exception->getFile());
        }
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        $auth_user = Auth::user();
        if ($auth_user != null) {
            $auth_user_id = $auth_user->id;
            $updated_by =  $auth_user_id;

            $request['updated_by'] =  $updated_by;
            $object = $post->update($request->all());
        }

        return redirect(route($this->routeName . '.index'))->with('status', $this->name . ' Updated Successfully.');
    }

    public function destroy(Post $post)
    {
        //
    }
    public function allPublicPost()
    {
        //
    }
}
