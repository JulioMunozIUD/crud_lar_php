@extends('dashboard.master')
@section('titulo', 'EditarPost')
@section('contenido')
@include('dashboard.partials.validation-error')
    <h1>Editar Post</h1>


    <form action="{{ url('dashboard/posts/'.$post->id) }}" method="post">
        @method("PUT")
        @csrf
        <main>
            <div class="row">
                <div class="from-group">
                    <label for="name">Articulo</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $post->name }}">
                </div>
            </div>

                <div class="row form-group">
                    <label for="description">Contenido</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $post->description }}</textarea>                    
                </div>

                <div class="row form-group">
                    <label for="description">Categoria</label>
                   <select name="categories" id="category">
                    <option value="">Seleccionar una categoria</option>
                    @foreach ($category as $category )
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                        
                    @endforeach
                   </select>
                </div>

                <div class="row center">
                    <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Editar</button>
                    <a href="{{ url('dashboard/posts') }}" class="btn btn-danger btn-sm">Cancelar</a>
                     
                </div>
                </div>

            
        </main>
    
    </form>
@endsection