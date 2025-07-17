@extends("layout.base")

@section("title", "Página Principal")

@section("conteudo_principal")

    <main>

        <div class="flex justify-end m-10">

            <form action="{{ route("logout") }}" method="POST">

                @csrf
                
                <button type="submit" class="btn btn-primary">Sair</button>
            
            </form>

        </div>

        <div id="container_principal" class="h-100 hidden justify-center items-center mx-auto bg-gradient-to-br from-purple-700 via-pink-500 to-red-500 w-1/2 rounded-3xl mt-30">

            <h1 class="text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-white to-yellow-300 opacity-0 animate-fade-in">Seja Bem-Vindo</h1>

        </div>

        <div class="m-10">
            
            <button data-modal-target="modalSucesso" data-modal-toggle="modalSucesso" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer" type="button">Confirmar Senha</button>
        
        </div>
    
        <div id="modalSucesso" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

            <div class="relative p-4 w-full max-w-2xl max-h-full">

                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-900">


                    <div class="flex flex-col justify-center items-center p-4 md:p-5 space-y-4">

                        <div class="flex flex-col justify-center items-center m-10">

                            <i id="mensagem_status" class="fas fa-times-circle fa-5x text-success mb-3"></i>

                            <p id="mensagem_texto" class="flex justify-center items-center mr-5 text-white text-xl"></p>

                        </div>

                    </div>

                </div>

            </div>
            
        </div>

        <form class="m-10" action="{{ route("two-factor.enable") }}" method="POST">

            @csrf

            <button id="botao_ativar" type="submit" class="hidden btn btn-primary">Ativar</button>

        </form>

        <form class="m-10" action="{{ route("two-factor.disable") }}" method="POST">

            @csrf

            @method("DELETE")

            <button id="botao_desativar" type="submit" class="hidden btn btn-primary">Desativar</button>

        </form>

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

        <div class="m-10">
            
            <button data-modal-target="modalLerqrCode" data-modal-toggle="modalLerqrCode" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer" type="button">Confirmar Autenticação</button>
        
        </div>
    
        <div id="modalLerqrCode" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

            <div class="relative p-4 w-full max-w-2xl max-h-full">

                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-900">
                    
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">

                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Confirmar Autenticação</h3>

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
            
                                <div id="campo_qrcode" class="flex justify-center items-center pt-5 pb-5 mt-3 mb-5 rounded bg-gray-200">{!! $qrCode !!}</div>
            
                            @endif

                            <form class="flex justify-center items-center" action="{{ route("two-factor.confirm") }}" method="POST">

                                @csrf

                                <input type="text" name="code" id="code" class="block w-3/4 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Insira o código de acesso..."/>

                                <div class="flex items-center p-4 md:p-5 border-gray-200 rounded-b dark:border-gray-600">

                                    <button type="submit" data-modal-hide="modalLerqrCode" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Enviar</button>
            
                                </div>

                            </form>
            
                        </div>

                    </div>

                </div>

            </div>
            
        </div>

        <div class="m-10">
            
            <button data-modal-target="modalLerqrCodeLogin" data-modal-toggle="modalLerqrCodeLogin" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer" type="button">Confirmar Autenticação</button>
        
        </div>
    
        <div id="modalLerqrCodeLogin" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

            <div class="relative p-4 w-full max-w-2xl max-h-full">

                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-900">
                    
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">

                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Confirmar Autenticação</h3>

                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer" data-modal-hide="modalLerqrCodeLogin">

                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">

                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>

                            </svg>

                        </button>

                    </div>

                    <div class="flex flex-col justify-center items-center p-4 md:p-5 space-y-4">

                        <div class="m-10">

                            <p class="flex justify-center items-center mr-5 text-white text-lg">Insira novamente o código de autenticação...</p>

                            <form class="flex flex-col justify-center items-center mt-5" action="{{ route("two-factor.login.store") }}" method="POST">

                                @csrf

                                <input type="text" name="code" id="code" class="block w-auto rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Insira o código de acesso..."/>

                                <div class="flex items-center p-4 md:p-5 border-gray-200 rounded-b dark:border-gray-600">

                                    <button type="submit" data-modal-hide="modalLerqrCodeLogin" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Enviar</button>
            
                                </div>

                            </form>
            
                        </div>

                    </div>

                </div>

            </div>
            
        </div>

    </main>

    <script>

        const container_principal = window.document.querySelector("#container_principal")

        const botao_ativar = window.document.querySelector("#botao_ativar")

        const modalSucesso = window.document.querySelector("#modalSucesso")
        const modalConfirmarSenha = window.document.querySelector("#modalConfirmarSenha")
        const modalLerqrCode = window.document.querySelector("#modalLerqrCode")
        const modalLerqrCodeLogin = window.document.querySelector("#modalLerqrCodeLogin")

        const mensagem_texto = window.document.querySelector("#mensagem_texto")
        const mensagem_status = window.document.querySelector("#mensagem_status")

        @if(session("confirmar_senha") == "confirmar_senha")

            botao_ativar.click()

        @elseif(session("confirmar_senha") == "confirmando" && empty(Auth::user()->two_factor_confirmed_at))

            modalConfirmarSenha.classList.remove("hidden")
            modalConfirmarSenha.classList.add("flex")

        @elseif(session("confirmar_senha") == "confirmado" && session("status") == "two-factor-authentication-enabled")

            modalLerqrCode.classList.remove("hidden")
            modalLerqrCode.classList.add("flex")

        @elseif(session("confirmar_senha") == "confirmar_novamente")

            modalLerqrCodeLogin.classList.remove("hidden")
            modalLerqrCodeLogin.classList.add("flex")

        @endif

        @if(session("confirmar_senha") == "confirmado" && session("status") != "two-factor-authentication-enabled" && session("status") != "two-factor-authentication-confirmed" && empty(Auth::user()->two_factor_confirmed_at))

            @if($errors->confirmTwoFactorAuthentication->has('code'))

                mensagem_texto.innerHTML = "Código Inválido! Tente Novamente!"
                mensagem_status.removeAttribute("class")
                mensagem_status.setAttribute("class", "fas fa-times-circle fa-5x text-red-600 mb-3")

                modalLerqrCode.classList.remove("flex")
                modalLerqrCode.classList.add("hidden")

                modalSucesso.classList.remove("hidden")
                modalSucesso.classList.add("flex")

                setTimeout(() => {
                
                    modalSucesso.classList.remove("flex")
                    modalSucesso.classList.add("hidden")

                    botao_ativar.click()

                }, 3000);

            @else

                botao_ativar.click()

            @endif

        @endif

        @if(session("status") == "two-factor-authentication-confirmed")

            container_principal.classList.remove("hidden")
            container_principal.classList.add("flex")

            mensagem_texto.innerHTML = "Autenticação de dois fatores habilitado com sucesso!"
            mensagem_status.removeAttribute("class")
            mensagem_status.setAttribute("class", "fas fa-check-circle fa-5x text-success mb-3")

            modalLerqrCode.classList.remove("flex")
            modalLerqrCode.classList.add("hidden")

            modalSucesso.classList.remove("hidden")
            modalSucesso.classList.add("flex")

            setTimeout(() => {
            
                modalSucesso.classList.remove("flex")
                modalSucesso.classList.add("hidden")

            }, 3000);

        @endif

        @if(!empty(Auth::user()->two_factor_confirmed_at))


            setTimeout(() => {
                
                container_principal.classList.remove("hidden")
                container_principal.classList.add("flex")

            }, 1000);
            
        @endif

    </script>

@endsection