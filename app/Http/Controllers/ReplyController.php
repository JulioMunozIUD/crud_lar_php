<?php

namespace App\Http\Controllers;

use App\Models\replies;
use App\Models\posts;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-reply|crear-reply|editar-reply|eliminar-reply',['only'=>['index']]);
        $this->middleware('permission:crear-reply',['only'=>['create','store']]);
        $this->middleware('permission:editar-reply',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-reply',['only'=>['destroy']]);
        
    }
    public function index()
    {
        $reply=replies::all();       
        return view('dashboard.reply.index',['reply'=>$reply]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.reply.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Text'=>'required|min:3|max:100'
        ]);
        $reply = new replies();
        $reply->Text=$request->input('Text');
        $reply->posts_id=$request->input('posts_id');        
        $reply->save();
        return view("dashboard.reply.message",['msg'=>"Reply creado con éxito"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(replies $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reply=replies::find($id);
        return view('dashboard.reply.edit',['reply'=>$reply]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Text'=>'required|min:3|max:100'
        ]);
        $reply=replies::find($id);      
        $reply->Text=$request->input('Text');
        $reply->posts_id=$request->input('posts_id');        
        $reply->save();
        return view("dashboard.reply.message",['msg'=>"Reply modificado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reply=replies::find($id);
        $reply->delete();
        return redirect("dashboard/reply");
    }
}