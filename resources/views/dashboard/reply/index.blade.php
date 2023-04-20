<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Replies
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @can('crear-reply')
                    <a href="{{ route('reply.create') }}" class="btn btn-primary btn-sm">Nuevo Reply</a>
                                     
                    @endcan
                    <table class="table table-info table-striped" >
                        <thead>
                            <tr>
                                <th>Reply</th>
                                <th>Permisos</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reply as $rel)
                                <tr>
                                    <td>{{ $rel->Text }}</td>
                                    <td>

                                        @forelse ($rel->permissions as $permission )
                                        <span class="badge text-bg-info">{{ $permission->Text }}</span>
                                            
                                        @empty
                                        <span class="badge text-bg-danfger">
                                            Sin permisos

                                        </span>

                                        @endforelse
                                    </td>
                                    <td>
                                        @can('editar-reply')
                                        <a href="{{ url('dashboard/replies'.$rel->id.'/edit') }}" class="bi bi-pencil"></a></td>                                      
                                         
                                        @endcan
                                        <td>
                                            @can('eliminar-reply')
                                            <form action="{{ url('dashboard/replies'.$rel->id) }}" method="post">
                                                @method("DELETE")
                                                @csrf
                                                <button class="bi bi-backspace-fill" type="submit"></button>
                                            </form>                                                
                                            @endcan
                                        </td>                             
                                   
                                </tr>
                                
                            @empty
                                No hay replies
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
