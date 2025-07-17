@extends("layout.base")

@section("title", "Página Principal")

<style>

    .fa-check-circle {

        transform: scale(0);

    }

    .fa-check-circle {

        animation: pop 5s ease forwards;

    }

    @keyframes pop {

        0% {

            transform: scale(0) rotate(0deg);

        }

        100% {

            transform: scale(1) rotate(360deg);

        }

    }

</style>

@section("conteudo_principal")

    <main>

        <div class="flex justify-end m-10">

            <form action="{{ route("logout") }}" method="POST">

                @csrf
                
                <button type="submit" class="btn btn-primary">Sair</button>
            
            </form>

        </div>

        <div class="text-3xl m-10">Seja Bem-Vindo!</div>

        <div class="m-10">
            
            <button data-modal-target="modalSucesso" data-modal-toggle="modalSucesso" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer" type="button">Confirmar Senha</button>
        
        </div>
    
        <div id="modalSucesso" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

            <div class="relative p-4 w-full max-w-2xl max-h-full">

                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-900">


                    <div class="flex flex-col justify-center items-center p-4 md:p-5 space-y-4">

                        <div class="flex flex-col justify-center items-center m-10">

                            <i class="fas fa-check-circle fa-5x text-success mb-3"></i>

                            <p class="flex justify-center items-center mr-5 text-white">Autenticação de dois fatores habilitado com sucesso!</p>

                        </div>

                    </div>

                </div>

            </div>
            
        </div>

        <div class="m-10">
            
            <button data-modal-target="modalLerqrCode" data-modal-toggle="modalLerqrCode" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer" type="button">Confirmar Senha</button>
        
        </div>
    
        <div id="modalLerqrCode" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

            <div class="relative p-4 w-full max-w-2xl max-h-full">

                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-900">
                    
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">

                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Confirmar Senha</h3>

                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer" data-modal-hide="modalLerqrCode">

                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">

                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>

                            </svg>

                        </button>

                    </div>

                    <div class="flex flex-col justify-center items-center p-4 md:p-5 space-y-4">

                        <div class="m-10">

                            <p class="flex justify-center items-center mr-5 text-white">Leia o <strong>"qrCode"</strong> e insera o valor enviado no campo abaixo.</p>
            
                            @if(isset($qrCode))
            
                                <div class="flex justify-center items-center pt-5 pb-5 mt-3 mb-5 rounded bg-gray-200">
                                    
                                    {!! $qrCode !!}

                                </div>
            
                            @endif

                            <form class="flex justify-center items-center" action="{{ route("two-factor.confirm") }}" method="POST">

                                @csrf

                                <input type="text" name="code" id="code" class="block w-3/4 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Insira o código de acesso..."/>

                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                                    <button id="botao_enviar" type="submit" data-modal-hide="modalLerqrCode" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Enviar</button>
            
                                </div>

                            </form>
            
                        </div>

                    </div>

                </div>

            </div>
            
        </div>

        @if(session("status") != "two-factor-authentication-enabled")

            <form class="m-10" action="{{ route("two-factor.enable") }}" method="POST">

                @csrf

                <button id="botao_ativar" type="submit" class="hidden btn btn-primary">Ativar</button>

            </form>

        @endif

        <form action="{{ route("password.confirm.store") }}" method="POST">

            @csrf

            <div class="m-10">
            
                <button data-modal-target="modalConfirmarSenha" data-modal-toggle="modalConfirmarSenha" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer" type="button">Confirmar Senha</button>
            
            </div>
        
            <div id="modalConfirmarSenha" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

                <div class="relative p-4 w-full max-w-2xl max-h-full">

                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-900">
                        
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">

                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Confirmar Senha</h3>

                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer" data-modal-hide="modalConfirmarSenha">

                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">

                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>

                                </svg>

                            </button>

                        </div>

                        <div class="flex flex-col justify-center items-center p-4 md:p-5 space-y-4">

                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">Insira sua senha nesse campo para confirmar...</p>

                            <input type="password" name="password" id="password" class="block w-2/4 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Confirme sua senha..."/>

                            @error("password")

                                <p class="text-red-500 text-bold mt-2">{{ $message }}</p>

                            @enderror

                        </div>

                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                            <button type="submit" data-modal-hide="modalConfirmarSenha" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Confirmar</button>

                            <button data-modal-hide="modalConfirmarSenha" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 cursor-pointer">Cancelar</button>

                        </div>

                    </div>

                </div>
                
            </div>

        </form>

    </main>

    @if(session("status") == "two-factor-authentication-confirmed")

        <script>

            const modalSucesso = document.querySelector("#modalSucesso")

            modalSucesso.classList.remove("hidden")
            modalSucesso.classList.add("flex")

            setTimeout(() => {
               
                modalSucesso.classList.remove("flex")
                modalSucesso.classList.add("hidden")

            }, 3000);

        </script>

    @elseif($confirmar_senha == "none" && session("status") != "two-factor-authentication-enabled")

        <script>

            botao_ativar.click()

        </script>

    @elseif(($confirmar_senha == "confirmar_senha" ) || $errors->has('password'))

        <script>

            const modalConfirmarSenha = document.querySelector("#modalConfirmarSenha")

            modalConfirmarSenha.classList.remove("hidden")
            modalConfirmarSenha.classList.add("flex")

        </script>

    @elseif(session("status") == "two-factor-authentication-enabled")

        <script>
   
            const modalLerqrCode = document.querySelector("#modalLerqrCode")

            modalLerqrCode.classList.remove("hidden")
            modalLerqrCode.classList.add("flex")

        </script>

    @endif

@endsection