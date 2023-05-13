<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear reply') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('dashboard.partials.validation-error') 
                    <form action="{{ route('reply.store') }}" method="post">
                        @csrf
                        <main>
                            <div class="row">
                                <div class="from-group">
                                    <label for="name">Reply</label><input class="form-control" type="text" name="name" id="name">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="text">Texto</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                            </div>
                            
                <div class="row form-group">
                    <label for="text">Post</label>
                   <select name="posts" id="post">
                    <option value="">Seleccionar un post</option>
                    @foreach ($post as $post )
                    <option value="{{ $post->id }}">{{ $post->name }}</option>
                        
                    @endforeach
                   </select>
                </div>

                <div class="row center">
                    <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Publicar</button>
                    <a href="{{ url('reply') }}" class="btn btn-danger btn-sm">Cancelar</a>
                </div>
                </div>

            
        </main>
    
    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
