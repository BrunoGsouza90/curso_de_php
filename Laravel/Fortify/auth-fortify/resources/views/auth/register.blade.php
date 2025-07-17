@extends("layout.base")

@section("title", "Register")

@section("conteudo_principal")

    <div class="flex flex-col justify-center items-center h-screen">

        <div>

            <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"/>

            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Registrar-se</h2>

        </div>

        <form class="w-100" action="{{ route("register.store") }}" method="POST">

            @csrf
        
            <div class="border-b border-gray-900/10 pb-12 mt-10">

                <div class="col-span-full mt-5">

                    <label for="street-address" class="block text-sm/6 font-medium text-gray-900">Nome</label>

                    <input type="text" name="name" id="text" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"/>

                </div>

                @error("name")

                    <div class="text-red-500 text-bold mt-2">{{ $message }}</div>

                @enderror
        
                <div class="sm:col-span-4 mt-5">

                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>

                    <div class="mt-2">

                    <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"/>

                    </div>

                    @error("email")

                        <div class="text-red-500 text-bold mt-2">{{ $message }}</div>

                    @enderror

                </div>
        
                <div class="col-span-full mt-5">

                    <label for="street-address" class="block text-sm/6 font-medium text-gray-900">Senha</label>

                    <input type="password" name="password" id="password" autocomplete="password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"/>

                </div>

                @error("password")

                    <div class="text-red-500 text-bold mt-2">{{ $message }}</div>

                @enderror

                <div class="col-span-full mt-5">

                    <label for="street-address" class="block text-sm/6 font-medium text-gray-900">Confirmar Senha</label>

                    <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="password_confirmation" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />

                </div>

                @error("password_confirmation")

                    <div class="text-red-500 text-bold mt-2">{{ $message }}</div>

                @enderror

            </div>
        
            <div class="mt-6 flex items-center justify-end gap-x-6">

                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">Registrar</button>

            </div>

            <p>Já tem uma conta? <a href="{{ route("login") }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Fazer Login</a></p>

        </form>

    </div>

@endsection