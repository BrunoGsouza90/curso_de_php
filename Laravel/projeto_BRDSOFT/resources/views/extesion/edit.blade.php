@extends('layout.base')

@section('title', 'Editar Ramal')

@section('route', route('extesions.index'))

@section('content_main')

<h1>Editar Ramal</h1>

    <form action="{{ route('extesions.update', $extesion->id) }}" method="POST">

        @csrf

        @method('PUT')

        <div>

            <label for="extesion">Ramal: </label>
            <input type="extesion" name="extesion" id="extesion" value="{{ empty(old('extesion')) ? $extesion->extesion : old('extesion') }}">

            @if($errors->has('extesion'))
                        
                @foreach($errors->get('extesion') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="name_ramal">Nome: </label>
            <input type="name_ramal" name="name_ramal" id="name_ramal" value="{{ empty(old('name_ramal')) ? $extesion->name_ramal : old('name_ramal') }}">

            @if($errors->has('name_ramal'))
                        
                @foreach($errors->get('name_ramal') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="callerid">Callerid: </label>
            <input type="callerid" name="callerid" id="callerid" value="{{ empty(old('callerid')) ? $extesion->callerid : old('callerid') }}">

            @if($errors->has('callerid'))
                        
                @foreach($errors->get('callerid') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br><br>

        <div>

            <button type="submit">Salvar</button>

        </div>

    </form>

@endsection