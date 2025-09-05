@extends('layout.base')

@section('title', 'Auditoria')

@section('route', route('index'))

@section('content_main')

    <form action="{{ route('audit.search') }}" method="POST">

        @csrf

        <input type="text" name="search_audits" id="search_audits">

        <button type="submit">Pesquisar</button>

    </form>

    <br>

    <table>

        <thead>

            <tr>

                <th>#</th>
                <th>Action</th>
                <th>Table</th>
                <th>IP</th>
                <th>User</th>
                <th>Server</th>
                <th>Antes</th>
                <th>Depois</th>
                <th>Request</th>

            </tr>

        </thead>

        <tbody>

            @if(count($audits) > 1)

                @foreach($audits as $audit)

                    <tr>
    
                        <td>{{ $audit->id}}</td>
                        <td>{{ $audit->action }}</td>
                        <td>{{ $audit->table }}</td>
                        <td>{{ $audit->ip }}</td>
                        <td>{{ $audit->name }}</td>
                        <td>{{ $audit->server }}</td>

                        @if(!empty($audit->date_before))

                            <td>
                                    
                                <form action="{{ route('before', $audit->id) }}" method="POST">

                                    @csrf

                                    <input type="hidden" name="table" value="{{ $audit->table }}">

                                    <button type="submit">Detalhes +</button>

                                </form>

                            </td>

                        @else

                            <td>---</td>

                        @endif

                        @if(!empty($audit->date_after))

                            <td>

                                <form action="{{ route('after', $audit->id) }}" method="POST">

                                    @csrf

                                    <input type="hidden" name="table" value="{{ $audit->table }}">

                                    <button type="submit">Detalhes +</button>

                                </form>

                            </td>

                        @else

                            <td>---</td>
                        
                        @endif

                        @if($audit->action == 'login' && !empty($audit->date_before))

                            <td>{{ $audit->date_before }}</td>

                        @else

                            <td>---</td>

                        @endif
    
                    </tr>

                @endforeach

            @else

                @foreach($audits as $audit)

                    <tr>
        
                        <td>{{ $audit->id }}</td>
                        <td>{{ $audit->action }}</td>
                        <td>{{ $audit->table }}</td>
                        <td>{{ $audit->ip }}</td>
                        <td>{{ $audit->name }}</td>
                        <td>{{ $audit->server }}</td>

                        @if(!empty($audit->date_before))

                            <td>
                                    
                                <form action="{{ route('before', $audit->id) }}" method="POST">

                                    @csrf

                                    <input type="hidden" name="table" value="{{ $audit->table }}">

                                    <button type="submit">Detalhes +</button>

                                </form>

                            </td>

                        @endif

                        @if(!empty($audit->date_after))

                            <td>
                                    
                                <form action="{{ route('after', $audit->id) }}" method="POST">

                                    @csrf

                                    <input type="hidden" name="table" value="{{ $audit->table }}">

                                    <button type="submit">Detalhes +</button>

                                </form>

                            </td>

                        @endif

                        @if($audit->action == 'login' && !empty($audit->date_before))

                            <td>{{ $audit->date_before }}</td>

                        @else

                            <td>---</td>

                        @endif

                    </tr> 

                @endforeach

            @endif

        </tbody>

    </table>

    <br>

    <div style="text-align: center">
        
        <p>{{ $audits->links() }}</p>
        <p>Total de páginas: {{ $audits->count() }}</p>
    
    </div>

@endsection