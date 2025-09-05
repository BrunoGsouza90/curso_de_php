@extends('layout.base')

@section('title', 'Detalhes depois')

@section('route', route('audits.index'))
    
@section('content_main')
    
    @if($table == 'users')

        <h1>Audit: {{ $audit->date_before['name'] }}.</h1>

    @elseif($table == 'dids')

        <h1>Audit: {{ $audit->date_before['number'] }}.</h1>

    @elseif($table == 'extesions')

        <h1>Audit: {{ $audit->date_before['name_ramal'] }}.</h1>

    @endif
    
    <h2>Depois</h2>

    @foreach($audit->date_after as $key => $value)

        <p>{{ $key }}: {{ $value }}.</p>

    @endforeach

@endsection