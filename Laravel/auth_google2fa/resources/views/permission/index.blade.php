@extends('layout.base')

@section('title', 'Permissões')

@section('route', route('users.index'))

@section('content_main')
    
    <h1>Usuário {{ $user->name }}</h1>

    <form action="{{ route('update_permission', $user->id) }}" method="POST">

        @csrf

        @method('PUT')

        <input type="hidden" name="is_admin" value="{{ $user->is_admin }}">

        @foreach($permissions_obj as $key => $permission)

            <label for="{{ $permission }}">
                
                {{ $count++ }} - {{ $key }}
            
            </label>

            <select name="{{ $permission }}" id="{{ $permission }}">

                <option {{ in_array($permission, $permissions_user) ? 'selected' : '' }} value="Sim">Sim</option>
                <option {{ !in_array($permission, $permissions_user) ? 'selected' : '' }} value="Não">Não</option>

            </select>

            <br><br>

        @endforeach

        <div>

            <button type="submit">Editar</button>

        </div>

    </form>

@endsection