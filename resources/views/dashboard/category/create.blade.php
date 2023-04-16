@extends('dashboard.master')
@section('titulo', 'AgregarCategoria')
@section('contenido')
@include('dashboard.partials.validation-error')
    <h1>Registrar Categoria</h1>


    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <main>
            <div class="row">
                <div class="from-group">
                    <label for="name">Nombre</label><input class="form-control" type="text" name="name" id="name">
                </div>
            </div>

                <div class="row form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>

                <div class="row center">
                    <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Registrar</button>
                    <button class="btn btn-danger btn-sm">Cancelar</button>
                </div>
                </div>

            
        </main>
    
    </form>
@endsection