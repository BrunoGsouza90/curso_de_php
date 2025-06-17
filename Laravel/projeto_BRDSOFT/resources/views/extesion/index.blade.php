@extends('layout.base')

@section('title', 'Ramais')

@section('route', route('index'))

@section('content_main')

    <form action="{{ route('extesions.search') }}" method="POST">

        @csrf

        <input type="text" name="search_extesions" id="search_extesions">
        
        <button type="submit">Pesquisar</button>

    </form>

    <br>

    @can('can-create_extesions')

        <a href="{{ route('extesions.create') }}">Criar Ramal</a>

    @endcan
    
    <br><br>

        <table>

            <thead>
    
                <tr>
    
                    <th>#</th>
                    <th>Ramal</th>
                    <th>Nome</th>
                    <th>type</th>
                    <th>Callerid</th>
                    <th>Usuário</th>
    
                </tr>
    
            </thead>
    
            <tbody>

                @if(count($users) > 1)

                    @foreach($users as $user)
    
                        <tr>
        
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->extesion }}</td>
                            <td>{{ $user->name_ramal }}</td>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user->callerid }}</td>
                            <td>{{ $user->name }}</td>
                        
                            <td><a href="{{ route('extesions.show', $user->id) }}">Visualizar</a></td>
                            
                            @can('can-edit_extesions')

                                <td><a href="{{ route('extesions.edit', $user->id) }}">Editar</a></td>

                            @endcan

                            @can('can-destroy_extesions')

                                <td>
            
                                    <form action="{{ route('extesions.destroy', $user->id) }}" method="POST">
            
                                        @csrf
            
                                        @method('DELETE')
            
                                        <div>
            
                                            <button type="submit">Excluir</button>
            
                                        </div>
            
                                    </form>
            
                                </td>

                            @endcan
        
                        </tr>
    
                    @endforeach

                @else

                    <tr>

                        @if(count($users) > 0)

                            @foreach($users as $user)
            
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->extesion }}</td>
                                <td>{{ $user->name_ramal }}</td>
                                <td>{{ $user->type }}</td>
                                <td>{{ $user->callerid }}</td>
                                <td>{{ $user->name }}</td>

                                <td><a href="{{ route('extesions.show', $user->id) }}">Visualizar</a></td>

                                @can('can-edit_extesions')

                                    <td><a href="{{ route('extesions.edit', $user->id) }}">Editar</a></td>

                                @endcan

                                @can('can-destroy_extesions')
            
                                    <td>
                
                                        <form action="{{ route('extesions.destroy', $user->id) }}" method="POST">
                
                                            @csrf
                
                                            @method('DELETE')
                
                                            <div>
                
                                                <button type="submit">Excluir</button>
                
                                            </div>
                
                                        </form>
                
                                    </td>
                                
                                @endcan

                            @endforeach

                        @endif
    
                    </tr> 

                @endif

            </tbody>
    
        </table>

@endsection