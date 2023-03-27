@extends('dashboard.master')
@section('titulo', 'poster')
@section('contenido')

<main>
    <div class= "container py-4">
        <h2>Post Publicados</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">Nuevo Post</a>
        <table class="table table-info table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha de creación</th>
                    <th>Fecha de modificación</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->categories->name ?? 'Sin clasificación' }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->state }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td><a href="{{ url('dashboard/posts/'.$post->id.'/edit') }}" class="bi bi-pencil-fill" ></a></td>
                    <td>
                        <form action="{{ url('dashboard/posts/'.$post->id) }}"  method="post">
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