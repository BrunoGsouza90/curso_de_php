@extends('layout.base')

@section('title', 'Lista de Usuários')

@section('route', route('index'))

@section('content_main')

    <div>

        <br>

        @if(session('success'))

            <p>{{ session('success') }}</p>

        @endif

        @if(session('error'))

            <p>{{ session('error') }}</p>

        @endif

        <form action="{{ route('reports.search') }}" method="POST">

            @csrf

            <input type="date" name="data_inicial" id="data_inicial" value="{{ old('data_inicial', request('data_inicial')) }}">
            <input type="time" name="hora_inicial" id="hora_inicial" value="{{ old('hora_inicial', request('hora_inicial')) }}">


            <input type="date" name="data_final" id="data_final" value= "{{ old('data_final', request('data_final')) }}">
            <input type="time" name="hora_final" id="hora_final" value="{{ old('hora_final', request('hora_final')) }}">

            <select name="status" id="status">
                
                @foreach(['Todos', 'Ativo', 'Inativo'] as $status)

                    <option value="{{ $status }}" 
                        {{ old('status', request('status')) == $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>

                @endforeach

            </select>                  

            <button type="submit">Pesquisar</button>

        </form>


        <br>

    </div>

    @can('can-pdf_generate')

        <form action="{{ route('reports.pdf') }}" method="POST">

            @csrf

            <input type="hidden" name="users" value="{{ json_encode($users) }}">

            <input type="hidden" name="data_inicial" value="{{ old('data_inicial', request('data_inicial')) }}">
            <input type="hidden" name="hora_inicial" value="{{ old('hora_inicial', request('hora_inicial')) }}">
            <input type="hidden" name="data_final" value="{{ old('data_final', request('data_final')) }}">
            <input type="hidden" name="hora_final" value="{{ old('hora_final', request('hora_final')) }}">

            <button type="submit">Gerar PDF</button>

        </form>

    @endcan

    <br>

    @can('can-csv_generate')

        <form action="{{ route('reports.csv') }}" method="POST">

            @csrf

            <input type="hidden" name="users" value="{{ json_encode($users) }}">

            <input type="hidden" name="data_inicial" value="{{ old('data_inicial', request('data_inicial')) }}">
            <input type="hidden" name="hora_inicial" value="{{ old('hora_inicial', request('hora_inicial')) }}">
            <input type="hidden" name="data_final" value="{{ old('data_final', request('data_final')) }}">
            <input type="hidden" name="hora_final" value="{{ old('hora_final', request('hora_final')) }}">

            <button type="submit">Gerar CSV</button>

        </form>

    @endcan

    @include('report.table_users')

@endsection