@extends('layout.base')

@section('title', 'Ramais')

@section('route', route('index'))

@section('content_main')

    <form action="{{ route('dids.search') }}" method="POST">

        @csrf

        <input type="text" name="search_dids" id="search_dids">
        
        <button type="submit">Pesquisar</button>

    </form>

    <br>

    @can('can-create_dids')

        <a href="{{ route('dids.create') }}">Criar DID</a>

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

                @if(count($dids) > 1)

                    @foreach($dids as $did)
    
                        <tr>
        
                            <td>{{ $did->id }}</td>
                            <td>{{ $did->number }}</td>
                        
                            <td><a href="{{ route('dids.show', $did->id) }}">Visualizar</a></td>
                            
                            @can('can-edit_dids')

                                <td><a href="{{ route('dids.edit', $did->id) }}">Editar</a></td>

                            @endcan

                            @can('can-destroy_dids')

                                <td>
            
                                    <form action="{{ route('dids.destroy', $did->id) }}" method="POST">
            
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

                        @if(count($dids) > 0)

                            @foreach($dids as $did)
        
                                <td>{{ $did->id }}</td>
                                <td>{{ $did->number }}</td>

                                <td><a href="{{ route('dids.show', $did->id) }}">Visualizar</a></td>

                                @can('can-edit_dids')

                                    <td><a href="{{ route('dids.edit', $did->id) }}">Editar</a></td>

                                @endcan

                                @can('can-destroy_dids')
            
                                    <td>
                
                                        <form action="{{ route('dids.destroy', $did->id) }}" method="POST">
                
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