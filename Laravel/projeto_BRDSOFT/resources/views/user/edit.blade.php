@extends('layout.base')

@section('title', 'Editar Usuário')

@section('route', route('users.index'))

@section('content_main')

<h1>Editar Usuário</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">

        @csrf

        @method('PUT')

        <div>

            <label for="name">Nome: </label>
            <input type="text" name="name" id="name" value="{{ empty(old('name')) ? $user->name : old('name') }}">

            @if($errors->has('name'))
                            
                @foreach($errors->get('name') as $e)
            
                    {{$e}}

                @endforeach

            @endif

        </div>

        <br>

        <div>

            <label for="login">Login: </label>
            <input readonly type="text" name="login" id="login" value="{{ empty(old('login')) ? $user->login : old('login') }}">

            @if($errors->has('login'))
                        
                @foreach($errors->get('login') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>
            
            <label for="email">Email: </label>
            <input readonly type="email" name="email" id="email" value="{{ empty(old('email')) ? $user->email : old('email') }}">

            @if($errors->has('email'))
                        
                @foreach($errors->get('email') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="document">CPF/CNPJ</label>
            <input type="text" name="document" id="document" value="{{ empty(old('document')) ? $user->document : old('document') }}">

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

                    @if(empty(old('status')))

                        <option {{ $user->status == $status ? 'selected' : '' }} value="{{ $status }}">{{ $status }}</option>

                    @else

                        <option {{ old('status') == $status ? 'selected' : '' }} value="{{ $status }}">{{ $status }}</option>


                    @endif

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
            <input type="text" name="country" id="country" value="{{ empty(old('country')) ? $user->country : old('country') }}">

            @if($errors->has('country'))
                        
                @foreach($errors->get('country') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="state">Estado: </label>
            <input type="text" name="state" id="state" value="{{ empty(old('state')) ? $user->state : old('state') }}">

            @if($errors->has('state'))
                        
                @foreach($errors->get('state') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="city">Cidade: </label>
            <input type="text" name="city" id="city" value="{{ empty(old('city')) ? $user->city : old('city') }}">

            @if($errors->has('city'))
                        
                @foreach($errors->get('city') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="telephone">Telefone: </label>
            <input type="text" name="telephone" id="telephone" value="{{ empty(old('telephone')) ? $user->telephone : old('telephone') }}">

            @if($errors->has('telephone'))
                        
                @foreach($errors->get('telephone') as $e)
                
                    {{$e}}

                @endforeach
        
            @endif

        </div>

        <br>

        <div>

            <label for="did">DID: </label>
            <input type="number" name="did" id="did" value="{{ empty(old('did')) ? $user->did : old('did') }}">

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

            <button type="submit">Salvar</button>

        </div>

    </form>

@endsection