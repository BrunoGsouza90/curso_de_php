@extends('layout.base')

@section('title', "Administrador $admin->name")

@can('can-view_admins')

    @section('route', route('admins.index'))

@else

    @section('route', route('index'))

@endcan

@section('content_main')

    @if(!$auth->name == 'Admin')

        @can('can-edit_acount')

            <a href="{{ route('admins.edit', $auth->id) }}">Editar minha conta</a>

            <br><br>

        @endcan

    @endif

    <h1>{{ $admin->is_admin == 'Sim' ? 'Administrador' : 'Usuário' }} {{ $admin->name }}</h1>

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

                <td>{{ !empty($admin->email) ? $admin->email : '---' }}</td>
                <td>{{ !empty($admin->login) ? $admin->login : '---' }}</td>
                <td>{{ !empty($admin->document) ? $admin->document : '---' }}</td>
                <td>{{ !empty($admin->status) ? $admin->status : '---' }}</td>
                <td>{{ !empty($admin->state) ? $admin->state : '---' }}</td>
                <td>{{ !empty($admin->city) ? $admin->city : '---' }}</td>
                <td>{{ !empty($admin->telephone) ? $admin->telephone : '---' }}</td>

            </tr>

        </tbody>

    </table>

@endsection