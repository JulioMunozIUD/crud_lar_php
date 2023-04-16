<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <main>
                <div class= "container py-4">
                    <h2>Categorias</h2>
                    @can('crear-categories')
                    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Nueva Categoria</a> 
                    @endcan                    
                    <table class="table table-striped table-info">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>                   
                                <th>Descripción</th>                    
                                <th>Fecha de creación</th>
                                <th>Fecha de modificación</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>                    
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>
                                    @can('editar-categories')
                                    <a href="{{ url('dashboard/categories/'.$category->id.'/edit') }}" class="bi bi-pencil-fill" ></a></td>
                                    @endcan
                                <td>
                                    @can('borrar-categories')
                                    <form action="{{ url('dashboard/categories/'.$category->id) }}"  method="post">
                                   
                                    @method("DELETE")
                                    @csrf                                    
                                    <button class="bi bi-backspace-fill" type="submit"></button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

