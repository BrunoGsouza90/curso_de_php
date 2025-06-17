@extends('layout.base')

@section('title', 'Editar DID')

@section('route', route('dids.index'))

@section('content_main')

<h1>Editar DID</h1>

    <form action="{{ route('dids.update', $did->id) }}" method="POST">

        @csrf

        @method('PUT')

        <div>

            <label for="number">Número: </label>
            <input type="text" name="number" id="number" value="{{ empty(old('number')) ? $did->number : old('number') }}">

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
            <textarea name="description" id="description" rows="10" cols="50">{{ empty(old('description')) ? $did->description : old('description') }}</textarea>

            @if($errors->has('description'))
                        
                @foreach($errors->get('description') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <div>

            <button type="submit">Salvar</button>

        </div>

    </form>

@endsection