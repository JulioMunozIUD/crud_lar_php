<?php

namespace App\Http\Controllers;


use App\Models\posts;
use App\Models\categories;
use Illuminate\Http\Request;

class postsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-posts|crear-posts|editar-posts|borrar-rol',['only'=>['index']]);
        $this->middleware('permission:crear-posts',['only'=>['create','store']]);
        $this->middleware('permission:editar-posts',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-posts',['only'=>['destroy']]);
    }
    public function index()
    {
        $post=posts::all();       
        return view('dashboard.post.index',['post'=>$post,'category'=>categories::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=categories::all();
        return view('dashboard.post.create',['category'=>$category]);
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:2'
        ]);
        $posts = new posts();
        $posts->name=$request->input('name');
        $posts->description=$request->input('description');
        $posts->category_id=$request->input('categories');
        $posts->save();
        return view("dashboard.post.message",['msg'=>"Publicación creada con éxito"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(posts $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)

    {
        $post=posts::find($id);
        return view('dashboard.post.edit',['post'=>$post, 'category'=>categories::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:2'
        ]);
        $post=posts::find($id);
        $post->name=$request->input('name');        
        $post->description=$request->input('description');
        $post->category_id=$request->input('categories');        
        $post->save();
        return view("dashboard.post.message",['msg'=>"Post modificado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post=posts::find($id);
        $post->delete();
        return redirect("dashboard/posts");
    }
}
