<h1>Login</h1>

<form action="{{ route('auth.verify_login') }}" method="POST">

    @csrf

    <div>
    
        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        @if($errors->has('email'))
                    
            @foreach($errors->get('email') as $e)
            
                {{$e}}

            @endforeach

        @endif
    
    </div>
    
    <br>
    
    <div>
    
        <label for="password">Senha</label>
        <input type="password" name="password" id="password">

        @if($errors->has('password'))
                    
            @foreach($errors->get('password') as $e)
            
                {{$e}}

            @endforeach

        @endif

        @if(session('error'))

            <span>{{ session('error') }}</span>

        @endif
    
    </div>
    
    <br>

    <div>
    
        <button type="submit">Entrar</button>
    
    </div>

</form>