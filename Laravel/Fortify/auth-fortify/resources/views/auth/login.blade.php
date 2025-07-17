@extends("layout.base")

@section("title", "Login")

@section("conteudo_principal")
    
  <div class="flex flex-col justify-center items-center h-screen">

      <div class="sm:mx-auto sm:w-full sm:max-w-sm">

        <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"/>

        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Entrar com sua conta</h2>

      </div>
    
      <div class="w-1/5 mt-10">

        <form class="space-y-6" action="{{route("login.store")}}" method="POST">

          @csrf

          <div>

              <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>

              <div class="mt-2">

                  <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />

              </div>

              @error('email')

                  <div class="text-red-500 text-bold mt-2">{{ $message }}</div>

              @enderror

          </div>
    
          <div>

            <div class="flex items-center justify-between">

              <label for="password" class="block text-sm/6 font-medium text-gray-900">Senha</label>
              
              <div class="text-sm">

                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Esqueceu sua senha?</a>

              </div>

            </div>

            <div class="mt-2">

              <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />

            </div>

            @error('email')

              <div class="text-red-500 text-bold mt-2">{{ $message }}</div>

          @enderror

          </div>
    
          <div>

            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">Entrar</button>

          </div>

        </form>
    
        <p class="mt-10 text-center text-sm/6 text-gray-500">

          Não tem uma conta?
          <a href="{{ route("register") }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Registre-se aqui!</a>

        </p>

    </div>

  </div>

@endsection