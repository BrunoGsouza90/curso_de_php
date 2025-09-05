@extends('layout.base')

@section('title', 'Cadastrar Ramal')

@section('route', route('extesions.index'))

@section('content_main')

    <h1>Cadastrar Ramal</h1>

    <form action="{{ route('extesions.store') }}" method="POST">

        @csrf

        <div>

            <label for="extesion">Ramal: </label>
            <input type="extesion" name="extesion" id="extesion" value="{{ old('extesion') }}">

            @if($errors->has('extesion'))
                        
                @foreach($errors->get('extesion') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="name_ramal">Nome: </label>
            <input type="name_ramal" name="name_ramal" id="name_ramal" value="{{ old('name_ramal') }}">

            @if($errors->has('name_ramal'))
                        
                @foreach($errors->get('name_ramal') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="callerid">Callerid: </label>
            <input type="callerid" name="callerid" id="callerid" value="{{ old('callerid') }}">

            @if($errors->has('callerid'))
                        
                @foreach($errors->get('callerid') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br><br>

        <div>

            <button type="submit">Cadastrar</button>

        </div>

    </form>

@endsection