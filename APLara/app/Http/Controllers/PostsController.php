<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','asc')->get();
        return view('posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('postAdd',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->user_id = \Auth::user()->id;
        $post->title = $request->title;
        $post->tresc = $request->message;
        if($post->save())
        {
            return redirect()->route('/');
        }
        return "Wystapił błąd!!!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Auth::user()!=null){
        $post = Post::find($id);
        return view('postsEditForm', compact('post'));
        }
        return "error!";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        if(\Auth::user()!=null){
        $post = Post::find($id);
        
        
        $post->tresc = $request->message;
        if($post->save()) {
        return redirect()->route('/');
        }
    }
        return "Wystąpił błąd.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Auth::user()!=null){
        $post = Post::find($id);
        if($post->delete()){
            return redirect()->route('/')->with(['success' => true,
            'message_type' => 'success',
            'message' => 'Pomyślnie skasowano komentarz użytkownika '.
            $post->user->name.'.']);
            }
            return back()->with(['success' => false, 'message_type' => 'danger',
            'message' => 'Wystąpił błąd podczas kasowania komentarza użytkownika '.
            $post->user->name.'. Spróbuj później.']);
        }
        return "error!";
    }
}
