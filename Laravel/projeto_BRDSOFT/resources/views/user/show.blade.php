@extends('layout.base')

@section('title', "Usuário $user->name")

@can('can-view_users')

    @section('route', route('users.index'))

@else

    @section('route', route('index'))

@endcan

@section('content_main')

    @if($auth->name != 'Admin')

        @can('can-edit_acount')

            <form action="{{ route('users.edit', $auth->id) }}" method="POST">

                @csrf

                <input type="hidden" name="user" value="">

                <input type="hidden" name="impersonate" id="impersonate" value="impersonate">

                <button type="submit">Editar Usuário</button>

            </form>

        @endcan

    @endif

    <h1>{{ $user->is_admin == 'Sim' ? 'Administrador' : 'Usuário' }} {{ $user->name }}</h1>

    <table>

        <thead>

            <tr>

                <th>Email</th>
                <th>Login</th>
                <th>CPF/CNPJ</th>
                <th>Status</th>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Telefone</th>

            </tr>

        </thead>

        <tbody>

            <tr>

                <td>{{ !empty($user->email) ? $user->email : '---' }}</td>
                <td>{{ !empty($user->login) ? $user->login : '---' }}</td>
                <td>{{ !empty($user->document) ? $user->document : '---' }}</td>
                <td>{{ !empty($user->status) ? $user->status : '---' }}</td>
                <td>{{ !empty($user->state) ? $user->state : '---' }}</td>
                <td>{{ !empty($user->city) ? $user->city : '---' }}</td>
                <td>{{ !empty($user->telephone) ? $user->telephone : '---' }}</td>

            </tr>

        </tbody>

    </table>

@endsection