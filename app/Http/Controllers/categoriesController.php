<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-categories|crear-categories|editar-categories|borrar-categories',['only'=>['index']]);
        $this->middleware('permission:crear-categories',['only'=>['create','store']]);
        $this->middleware('permission:editar-categories',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-categories',['only'=>['destroy']]);
    }
    public function index()
    {
        $category=categories::all();
        return view('dashboard.category.index',['category'=>$category]);       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
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
        $category = new categories();
        $category->name=$request->input('name');
        $category->description=$request->input('description');
        $category->save();
        return view("dashboard.category.message",['msg'=>"Categoria creada con éxito"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=categories::find($id);
        return view('dashboard.category.edit',['category'=>$category]);
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
        $category=categories::find($id);
        $category->name=$request->input('name');        
        $category->description=$request->input('description');
        $category->save();
        return view("dashboard.category.message",['msg'=>"Categoria modificado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category=categories::find($id);
        $category->delete();
        return redirect("dashboard/categories");
    }
}
