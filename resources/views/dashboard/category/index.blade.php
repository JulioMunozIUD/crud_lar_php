@extends('dashboard.master')
@section('titulo', 'poster')
@section('contenido')

<main>
    <div class= "container py-4">
        <h2>Categorias</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Nueva Categoria</a>
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
                    <td><a href="{{ url('dashboard/categories/'.$category->id.'/edit') }}" class="bi bi-pencil-fill" ></a></td>
                    <td>
                        <form action="{{ url('dashboard/categories/'.$category->id) }}"  method="post">
                        @method("DELETE")
                        @csrf
                        <button class="bi bi-backspace-fill" type="submit"></button>
                        </form>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection