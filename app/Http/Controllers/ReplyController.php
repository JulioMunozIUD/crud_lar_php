<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Models\posts;

class ReplyController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-reply|crear-posts|editar-reply|borrar-reply',['only'=>['index']]);
        $this->middleware('permission:crear-reply',['only'=>['create','store']]);
        $this->middleware('permission:editar-reply',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-reply',['only'=>['destroy']]);
    }
    public function index()
    {
        $reply=reply::class::all();
        return view('dashboard.reply.index', ['reply'=>$reply,'post'=>posts::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post=posts::all();
        return view('dashboard.reply.create',['post'=>$post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $reply = new reply(); 
        $reply->post_id=$request->input('posts');       
        $reply->text=$request->input('description');      
        $reply->save();
        return view('dashboard.reply.edit');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reply=reply::find($id);
        return view('dashboard.reply.edit',['reply'=>$reply, 'post'=>posts::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reply $reply)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:2'
        ]);

        $reply = new reply(); 
        $reply->post_id=$request->input('posts');       
        $reply->text=$request->input('description');      
        $reply->save();
        return redirect()->route('reply.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reply=reply::find($id);
        $reply->delete();
        return redirect()->route('reply.index');
    }
}
