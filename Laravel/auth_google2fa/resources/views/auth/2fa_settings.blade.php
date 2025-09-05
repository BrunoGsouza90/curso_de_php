<div class="container">

    <div class="row justify-content-md-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">

                    <strong>Autenticação em Duas Etapas</strong>

                </div>

                <div class="card-body">

                    <p>A autenticação em duas etapas (2FA) reforça a segurança de acesso exigindo dois métodos (também chamados de fatores) para verificar sua identidade. A autenticação em duas etapas protege contra phishing, engenharia social e ataques de força bruta a senhas, protegendo seus logins contra invasores que exploram credenciais fracas ou roubadas.</p>

                    @if (session('error'))

                        <div class="alert alert-danger">

                            {{ session('error') }}

                        </div>
                    @endif

                    @if (session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                    @endif

                    @if($data['user']->loginSecurity == null)

                        <form class="form-horizontal" method="POST" action="{{ route('generate2faSecret') }}">

                            @csrf

                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Gerar Chave Secreta para Ativar 2FA</button>

                            </div>

                        </form>

                    @elseif(!$data['user']->loginSecurity->google2fa_enable)

                        1. Escaneie este código QR com o aplicativo Google Authenticator. Alternativamente, você pode usar o código: <code>{{ $data['secret'] }}</code><br/>

                        <img src="{{$data['google2fa_url'] }}" alt="">

                        <br/><br/>

                        <span>2. Insira o código do aplicativo Google Authenticator:</span>
                        
                        <br/><br/>

                        <form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">

                            @csrf

                            <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">

                                <label for="secret" class="control-label">Código do Autenticador</label>

                                <input id="secret" type="password" class="form-control col-md-4" name="secret" required>

                                @if ($errors->has('verify-code'))

                                    <span class="help-block">

                                    <strong>{{ $errors->first('verify-code') }}</strong>

                                    </span>

                                @endif

                            </div>

                            <button type="submit" class="btn btn-primary">Ativar 2FA</button>

                        </form>

                    @elseif($data['user']->loginSecurity->google2fa_enable)

                        <div class="alert alert-success">

                            O 2FA está atualmente <strong>ativado</strong> na sua conta.

                        </div>

                        <p>Se você deseja desativar a Autenticação em Duas Etapas, confirme sua senha e clique no botão "Desativar 2FA".</p>

                        <form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">

                            @csrf

                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">

                                <label for="change-password" class="control-label">Senha Atual</label>

                                    <input id="current-password" type="password" class="form-control col-md-4" name="current-password" required>

                                    @if ($errors->has('current-password'))

                                        <span class="help-block">

                                    <strong>{{ $errors->first('current-password') }}</strong>

                                    </span>

                                    @endif

                            </div>

                            <button type="submit" class="btn btn-primary ">Desativar 2FA</button>

                        </form>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>