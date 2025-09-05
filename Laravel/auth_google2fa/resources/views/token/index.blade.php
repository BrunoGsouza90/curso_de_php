@extends('layout.base')

@section('title', 'Tokens')

@section('route', route('index'))

@section('content_main')

    <form action="{{ route('tokens.search') }}" method="POST">

        @csrf

        <input type="text" name="search_tokens" id="search_tokens">
        
        <button type="submit">Pesquisar</button>

    </form>

    <br>

    @can('can-create_tokens')

        <a href="{{ route('tokens.create') }}">Gerar Token</a>

    @endcan
    
    <br><br>

        <table>

            <thead>
    
                <tr>
    
                    <th>#</th>
                    <th>Número</th>
    
                </tr>
    
            </thead>
    
            <tbody>

                @if(count($tokens) > 1)

                    @foreach($tokens as $token)
    
                        <tr>
        
                            <td>{{ $token->id }}</td>
                            <td>{{ $token->number }}</td>
                        
                            <td><a href="{{ route('tokens.show', $token->id) }}">Visualizar</a></td>
                            
                            @can('can-edit_tokens')

                                <td><a href="{{ route('tokens.edit', $token->id) }}">Editar</a></td>

                            @endcan

                            @can('can-destroy_tokens')

                                <td>
            
                                    <form action="{{ route('tokens.destroy', $token->id) }}" method="POST">
            
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

                        @if(count($tokens) > 0)

                            @foreach($tokens as $token)
        
                                <td>{{ $token->id }}</td>
                                <td>{{ $token->number }}</td>

                                <td><a href="{{ route('tokens.show', $token->id) }}">Visualizar</a></td>

                                @can('can-edit_tokens')

                                    <td><a href="{{ route('tokens.edit', $token->id) }}">Editar</a></td>

                                @endcan

                                @can('can-destroy_tokens')
            
                                    <td>
                
                                        <form action="{{ route('tokens.destroy', $token->id) }}" method="POST">
                
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