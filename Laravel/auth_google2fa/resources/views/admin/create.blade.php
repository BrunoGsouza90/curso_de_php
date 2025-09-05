@extends('layout.base')

@section('title', 'Cadastrar Admin')

@section('route', route('admins.index'))

@section('content_main')

    <h1>Cadastrar Admin</h1>

    <form action="{{ route('admins.store') }}" method="POST">

        @csrf

        <div>

            <label for="name">Nome: </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">

            @if($errors->has('name'))
                        
                @foreach($errors->get('name') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="login">Login: </label>
            <input type="text" name="login" id="login" value="{{ old('login') }}">

            @if($errors->has('login'))
                        
                @foreach($errors->get('login') as $e)
                
                    {{$e}}

                @endforeach
            
            @endif

        </div>

        <br>

        <div>
            
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">

            @if($errors->has('email'))
                        
                @foreach($errors->get('email') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="document">CPF/CNPJ</label>
            <input type="text" name="document" id="document" value="{{ old('document') }}">

            @if($errors->has('document'))
                        
                @foreach($errors->get('document') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="status">Status: </label>

            <select name="status" id="status">

                @foreach(['Ativo', 'Inativo'] as $status)

                    <option {{ $status == old('status') ? 'selected' : '' }} value="{{ $status }}">{{ $status }}</option>

                @endforeach

            </select>

            @if($errors->has('status'))
                        
                @foreach($errors->get('status') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="country">País: </label>
            <input type="text" name="country" id="country" value="{{ old('country') }}">

            @if($errors->has('country'))
                        
                @foreach($errors->get('country') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="state">Estado: </label>
            <input type="text" name="state" id="state" value="{{ old('state') }}">

            @if($errors->has('state'))
                        
                @foreach($errors->get('state') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="city">Cidade: </label>
            <input type="text" name="city" id="city" value="{{ old('city') }}">

            @if($errors->has('city'))
                        
                @foreach($errors->get('city') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="telephone">Telefone: </label>
            <input type="text" name="telephone" id="telephone" value="{{ old('telephone') }}">

            @if($errors->has('telephone'))
                        
                @foreach($errors->get('telephone') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif


        </div>

        <br>

        <div>

            <label for="did">DID: </label>
            <input type="text" name="did" id="did" value="{{ old('did') }}">

            @if($errors->has('did'))
                        
                @foreach($errors->get('did') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif


        </div>

        <br>

        <div>

            <label for="password">Senha: </label>
            <input type="password" name="password" id="password">

            @if($errors->has('password'))
                        
                @foreach($errors->get('password') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="password_confirmation">Confirmar Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation">

            @if($errors->has('password_confirmation'))
                        
                @foreach($errors->get('password_confirmation') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>
        
        <div>

            <input type="hidden" name="register" value="User">

        </div>

        <div>

            <button type="submit">Cadastrar</button>

        </div>

    </form>

@endsection