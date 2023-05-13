<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <main>
                <div class= "container py-4">
                    <h2>Reply Publicados</h2>
                    @can('crear-post')                     
                    <a href="{{ route('reply.create') }}" class="btn btn-primary btn-sm">Nuevo Reply</a>
                    @endcan
                    <table class="table table-info table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Post</th>
                                <th>Texto</th>                                
                                <th>Fecha de creación</th>
                                <th>Fecha de modificación</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reply as $reply)
                            <tr>
                                <td>{{ $reply->id }}</td>
                                <td>{{ $reply->post_id }}</td>
                                <td>{{ $reply->description }}</td>                              
                                <td>{{ $reply->created_at }}</td>
                                <td>{{ $reply->updated_at }}</td>
                                <td>
                                    @can('editar-reply')                                       
                                    <a href="{{ url('reply/'.$reply->id.'/edit') }}" class="bi bi-pencil-fill" ></a></td>
                                    @endcan
                                <td>
                                    @can('borrar-reply')                                      
                                    <form action="{{ url('reply/'.$reply->id) }}"  method="post">
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
