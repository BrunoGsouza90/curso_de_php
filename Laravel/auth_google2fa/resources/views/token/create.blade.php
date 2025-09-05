@extends('layout.base')

@section('title', 'Cadastrar DID')

@section('route', route('dids.index'))

@section('content_main')

    <h1>Cadastrar DID</h1>

    <form action="{{ route('dids.store') }}" method="POST">

        @csrf

        <div>

            <label for="number">Número: </label>
            <input type="number" name="number" id="number" value="{{ old('number') }}">

            @if($errors->has('number'))
                        
                @foreach($errors->get('number') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="description">Descrição: </label>
            <br>
            <textarea name="description" id="description" rows="10" cols="50">{{ old('description') }}</textarea>

            @if($errors->has('description'))
                        
                @foreach($errors->get('description') as $e)
                
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