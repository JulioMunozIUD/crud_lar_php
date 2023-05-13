@extends('dashboard.master')
@section('titulo', 'Mensaje')
@section('contenido')
<h1>Mensaje:</h1>
<div class="container py-4">
    <h2>{{ $msg }}</h2>
    <a href="{{ url('dashboard/reply') }}" class="btn btn-danger">Regresar</a>
</div>
