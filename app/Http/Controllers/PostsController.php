<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post();

        // isCheck checkbox
        if (isset($request->status)){
            $status = '1';
        }else{
            $status = '0';
        }

        // upload file
        if ($file = $request->file('file')){
            $name = $file->getClientOriginalName();
            $file->move('images',$name);
            $post->path = $name;
        }

        $post->title = $request->title;
        $post->content = $request->description;
        $post->email = $request->email;
        $post->status = $status;
        $post->user_id = Auth::id();
        $post->save();
        $request->session()->flash('messages' , 'مطلب شما با موفقیت ثبت شد');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        event(new PostViewEvent($post));
        return  view('posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();

        if ($user->can('update',$post)){
            return  view('posts.edit' ,compact('post'));

        }else{
            return 'اجازه دسترسی به این بخش را ندارید';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        if (isset($request->status)){
            $status = '1';
        }else{
            $status = '0';
        }
        $post->title = $request->title;
        $post->content = $request->description;
        $post->email = $request->email;
        $post->status = $status;
        $post->user_id = 1;
        $post->save();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts');
    }


}
