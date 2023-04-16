<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('dashboard.partials.validation-error')
                    <form action="{{ url('usuarios/'.$user->id) }}" method="post">

                        <div class="mb-3 row">
                            <label for="name">Nombre</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="name" id="name"
                                value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name">Email</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="email" id="name"
                                value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name">Password</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="password" id="name"
                                value="">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name">Confirmar Password</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="password" id="name"
                                value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description">Rol</label>
                            <div class="col-sm-5">
                                <select name="roles" id="roles">
                                    <option value="">Seleccionar un rol</option>
                                    @foreach ($roles as $id=>$rol)
                                        <option value="{{ $id }}">{{ $rol }}</option>                                        
                                    @endforeach                                    
                                </select>                           
                                                       

                        <div class="row center">
                            <div class="col s6">
                            <button class="btn btn-success btn-sm" type="submit">Editar</button>
                            <a href="{{ url('usuarios') }}" class="btn btn-danger btn-sm">Cancelar</a>
                             
                        </div>
                        </div>
        
                        @csrf
                        @method("PUT")
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
