<div class="container">

    <div class="row justify-content-md-center">

        <div class="col-md-8 ">

            <div class="card">

                <div class="card-header">Autenticação em Duas Etapas</div>

                <div class="card-body">

                    <p>A autenticação em duas etapas (2FA) reforça a segurança de acesso exigindo dois métodos (também chamados de fatores) para verificar sua identidade. A autenticação em duas etapas protege contra phishing, engenharia social e ataques de força bruta a senhas, protegendo seus logins contra invasores que exploram credenciais fracas ou roubadas.</p>

                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul>

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <span>Insira o código do aplicativo Google Authenticator:</span>
                    
                    <br/><br/>

                    <form class="form-horizontal" action="{{ route('2faVerify') }}" method="POST">

                        @csrf

                        <div class="form-group{{ $errors->has('one_time_password-code') ? ' has-error' : '' }}">

                            <label for="one_time_password" class="control-label">Senha de Uso Único</label>
                            <input id="one_time_password" name="one_time_password" class="form-control col-md-4"  type="text" required/>

                        </div>

                        <button class="btn btn-primary" type="submit">Autenticar</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>