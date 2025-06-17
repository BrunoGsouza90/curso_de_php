@extends('layout.base')

@section('title', 'Administradores')

@section('route', route('index'))

@section('content_main')

    <form action="{{ route('admins.search') }}" method="POST">

        @csrf

        <input type="text" name="search_admins" id="search_admins">
        
        <button type="submit">Pesquisar</button>

    </form>

    <br>

    @can('can-create_admins')

        <a href="{{ route('admins.create') }}">Criar Administrador</a>

    @endcan
    
    <br><br>

        <table>

            <thead>
    
                <tr>
    
                    <th>#</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Impersonate</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                    <th>Permissões</th>
    
                </tr>
    
            </thead>
    
            <tbody>

                @if(count($admins) > 1)

                    @foreach($admins as $admin)
    
                        <tr>
        
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->status }}</td>

                            @if($admin->name != 'Admin')

                                @if(Session::get('impersonate') == null && $admin->status == 'Ativo')

                                    <td>
                                        
                                        <a href="{{ route('impersonates.login', $admin->id) }}">Impersonate</a>
                                    
                                    </td>

                                @else

                                    <td>---</td>

                                @endif

                                @can('can-view_admins')
                            
                                    <td><a href="{{ route('admins.show', $admin->id) }}">Visualizar</a></td>

                                @else

                                    <td>---</td>

                                @endcan
                                
                                @can('can-edit_admins')

                                    <td><a href="{{ route('admins.edit', $admin->id) }}">Editar</a></td>

                                @else

                                    <td>---</td>

                                @endcan

                                @can('can-destroy_admins')

                                    @if($admin->status == 'Ativo')

                                        <td>
                    
                                            <form action="{{ route('admins.destroy', $admin->id) }}" method="POST">
                    
                                                @csrf
                    
                                                @method('DELETE')
                    
                                                <div>
                    
                                                    <button type="submit">Excluir</button>
                    
                                                </div>
                    
                                            </form>
                    
                                        </td>

                                    @else

                                        <td>

                                            <form action="{{ route('admins.reactivate', $admin->id) }}" method="POST">

                                                @csrf

                                                @method('PUT')

                                                <button type="submit">Reativar</button>

                                            </form>

                                        </td>

                                    @endif

                                @else

                                    <td>---</td>

                                @endcan

                                @can('can-manipulate_permissions')

                                    <td><a href="{{ route('permission', $admin->id) }}">Permissões</a></td>

                                @else

                                    <td>---</td>

                                @endcan

                            @endif
        
                        </tr>
    
                    @endforeach

                @else

                    <tr>

                        @foreach($admins as $admin)
        
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->status }}</td>
                        
                            @if($admin->name != 'Admin')

                                @if(Session::get('impersonate') == null && $admin->status == 'Ativo')

                                    <td>
                                        
                                        <a href="{{ route('impersonates.login', $admin->id) }}">Impersonate</a>
                                    
                                    </td>

                                @else

                                    <td>---</td>

                                @endif

                                @can('can-view_admins')

                                    <td><a href="{{ route('admins.show', $admin->id) }}">Visualizar</a></td>

                                @else

                                    <td>---</td>

                                @endcan

                                @can('can-edit_admins')

                                    <td><a href="{{ route('admins.edit', $admin->id) }}">Editar</a></td>

                                @else

                                    <td>---</td>

                                @endcan

                                @can('can-destroy_admins')

                                    @if($admin->status == 'Ativo')
            
                                        <td>
                    
                                            <form action="{{ route('admins.destroy', $admin->id) }}" method="POST">
                    
                                                @csrf
                    
                                                @method('DELETE')
                    
                                                <div>
                    
                                                    <button type="submit">Excluir</button>
                    
                                                </div>
                    
                                            </form>
                    
                                        </td>
                                    
                                    @else

                                        <td>

                                            <form action="{{ route('admins.reactivate', $admin->id) }}" method="POST">

                                                @csrf

                                                @method('PUT')

                                                <button type="submit">Reativar</button>

                                            </form>

                                        </td>

                                    @endif

                                @else

                                    <td>---</td>
                                
                                @endcan

                                @can('can-manipulate_permissions')

                                    <td><a href="{{ route('permission', $admin->id) }}">Permissões</a></td>
                                
                                @else

                                    <td>---</td>

                                @endcan

                            @endif

                        @endforeach
    
                    </tr> 

                @endif
    
            </tbody>
    
        </table>

</body>

</html>

@endsection