@extends('layout.base')

@section('title', 'Usuários')

@section('route', route('index'))

@section('content_main')

    <form action="{{ route('users.search') }}" method="POST">

        @csrf

        <input type="text" name="search_users" id="search_users">
        
        <button type="submit">Pesquisar</button>

    </form>

    <br>

    </div>
    
    @can('can-create_users')

        <a href="{{ route('users.create') }}">Criar Usuário</a>

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

                @if(count($users) > 1)

                    @foreach($users as $user)
    
                        <tr>
        
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->status }}</td>

                            @if($user->name != 'Admin')

                                @if(Session::get('impersonate') == null && $user->status == 'Ativo')

                                    <td><a href="{{ route('impersonates.login', $user->id) }}">Impersonate</a></td>

                                @else

                                    <td>---</td>

                                @endif

                                @can('can-view_users')
                            
                                    <td><a href="{{ route('users.show', $user->id) }}">Visualizar</a></td>

                                @else

                                    <td>---</td>

                                @endcan
                                
                                @can('can-edit_users')

                                    <td><a href="{{ route('users.edit', $user->id) }}">Editar</a></td>

                                @else

                                    <td>---</td>

                                @endcan

                                @can('can-destroy_users')

                                    @if($user->status == 'Ativo')

                                        <td>
                    
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    
                                                @csrf
                    
                                                @method('DELETE')
                    
                                                <div>
                    
                                                    <button type="submit">Excluir</button>
                    
                                                </div>
                    
                                            </form>
                    
                                        </td>

                                    @else

                                        <td>

                                            <form action="{{ route('users.reactivate', $user->id) }}" method="POST">

                                                @csrf

                                                @method('PUT')

                                                <button type="submit">Reativar</button>

                                            </form>

                                        </td>

                                    @endif

                                @endcan

                                @can('can-manipulate_permissions')

                                    <td><a href="{{ route('permission', $user->id) }}">Permissões</a></td>

                                @endcan

                            @endif
        
                        </tr>
    
                    @endforeach

                @else

                    <tr>

                        @foreach($users as $user)
        
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->status }}</td>
                        
                            @if($user->name != 'Admin')

                                @if(Session::get('impersonate') == null && $user->status == 'Ativo')

                                    <td><a href="{{ route('impersonates.login', $user->id) }}">Impersonate</a></td>

                                @else

                                    <td>---</td>

                                @endif

                                @can('can-view_users')

                                    <td><a href="{{ route('users.show', $user->id) }}">Visualizar</a></td>

                                @else

                                    <td>---</td>

                                @endcan

                                @can('can-edit_users')

                                    <td><a href="{{ route('users.edit', $user->id) }}">Editar</a></td>

                                @else

                                    <td>---</td>

                                @endcan

                                @can('can-destroy_users')

                                    @if($user->status == 'Ativo')
            
                                        <td>
                    
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    
                                                @csrf
                    
                                                @method('DELETE')
                    
                                                <div>
                    
                                                    <button type="submit">Excluir</button>
                    
                                                </div>
                    
                                            </form>
                    
                                        </td>

                                    @else

                                        <td>

                                            <form action="{{ route('users.reactivate', $user->id) }}" method="POST">

                                                @csrf

                                                @method('PUT')

                                                <button type="submit">Reativar</button>

                                            </form>

                                        </td>

                                    @endif
                                
                                @endcan

                                @can('can-manipulate_permissions')

                                    <td><a href="{{ route('permission', $user->id) }}">Permissões</a></td>

                                @else

                                    <td>---</td>

                                @endcan

                            @endif

                        @endforeach
    
                    </tr> 

                @endif
    
            </tbody>
    
        </table>

@endsection