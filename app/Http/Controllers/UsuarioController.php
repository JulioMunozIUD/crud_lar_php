<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;


class UsuarioController extends Controller

{

    function __construct()
    {
        $this->middleware('permission:ver-usuarios|crear-usuarios|editar-usuarios|borrar-usuarios',['only'=>['index']]);
        $this->middleware('permission:crear-usuarios',['only'=>['create','store']]);
        $this->middleware('permission:editar-usuarios',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-usuarios',['only'=>['destroy']]);
    }
    
    public function index()
    {
        $usuarios=user::all();
        return view('dashboard.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::pluck('name', 'name')->all();
        return view('dashboard.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'roles'=>'required'        
        ]);

        $input=$request->all();
        $input['password']=Hash::make($input['password']);
        $user=User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        $roles=Role::pluck('name', 'name')->all();
        $userRole=$user->roles->pluck('name','name')->all();
        return view('dashboard.usuarios.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->Validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|same:confirme-password',
            'roles'=>'required']);

            $input=$request->all();
            if(!empty($input['password']))
            {
                $input['password']=Hash::make($input['password']);                
            }else{
                $input=Arr::except($input, array('password'));                
            }
            $user=User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('roles'));
            return redirect()->route('dashboard.usuario.index');
            //return view('dashboard.usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index');

    }
}

