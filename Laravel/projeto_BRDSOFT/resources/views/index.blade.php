<h1>Seja Bem-Vindo {{ $auth->name }}!</h1>

@if(Session::get('impersonate') == 'impersonate')

<p>User imperssonation: {{ Session::get('user_name') }}</p>
<a href="{{ route('impersonates.logout') }}">Voltar como admin</a>

@endif

<br><br>

<a href="{{ route('auth.logout') }}">Sair</a>

<br><br>

<a href="{{ route('contact.index') }}">Contato</a>

<br><br>

@if(session('success'))

    <p>{{ session('success') }}</p>

@endif

@if(session('error'))

    <p>{{ session('error') }}</p>

@endif

@foreach($auth->roles as $role)

    @can('can-view_report')

        <a href="{{ route('reports.index') }}">Relatório</a>

        <br><br>

    @endcan

    @can('can-view_users')

        <a href="{{ route('users.index') }}">Visualizar Usuários</a>

        <br><br>

    @endcan

    @can('can-view_admins')

        <a href="{{ route('admins.index') }}">Visualizar Administradores</a>

        <br><br>

    @endcan

    @can('can-view_audit')

        <a href="{{ route('audits.index') }}">Visualizar Auditorias</a>

        <br><br>

    @endcan

    @can('can-view_dids')

        <a href="{{ route('dids.index') }}">Visualizar DIDS</a>

        <br><br>

    @endcan

    @can('can-view_extesions')

        <a href="{{ route('extesions.index') }}">Vizualizar Ramais</a>

        <br><br>   

    @endcan

    @can('can-edit_acount')

        @if($auth->is_admin == 'Sim')

            <a href="{{ route('admins.edit', $auth->id) }}">Editar minha conta</a>

        @else

            <a href="{{ route('users.edit', $auth->id) }}">Editar minha conta</a>

        @endif

        <br><br>

    @endcan

    @can('can-destroy_acount')
    
        <form action="{{ route('users.destroy', $auth->id) }}" method="POST">

            @csrf

            @method('DELETE')

            <div>

                <button type="submit">Excluir</button>

            </div>

        </form>

    @endcan

@endforeach


<br><br><br>


<h2>SNMP</h2>
<a href="{{ route('snmp.index') }}">Visualizar SNMP</a>