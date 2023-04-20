@extends('dashboard.master')
@section('titulo', 'AgregarReply')
@section('contenido')
@include('dashboard.partials.validation-error')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('reply') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm_rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('dashboard.partials.validation-error')
                    <form action="{{ route('reply.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="name">Text:</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="text" id="Text"
                                value="{{ old('Text') }}">

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name">Permisos del reply</label>
                        <div class="col-sm-5">
                            <table>
                                <tbody>
                                    @foreach ($permission as $id=>$permiso )
                                    <tr>
                                        <td>
                                            <input class="form-chek-input" type="checkbox" name="permission[]" value="{{ $id }}">
                                            {{ $permiso }}
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row center">
                        <div class="col s6">
                            <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                            <a href="{{ url('/dashboard/replies') }}" class="btn btn-secondary btn-sm">Cancelar</a>

                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>