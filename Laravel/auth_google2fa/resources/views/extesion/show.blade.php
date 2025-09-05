@extends('layout.base')

@section('title', "Ramal $extesion->name_ramal")

@section('route', route('extesions.index'))

@section('content_main')

    <h1>Ramal: {{ $extesion->name_ramal }}</h1>

    <p>ID: {{ $extesion->id }}.</p>
    <p>Número: {{ $extesion->extension }}.</p>
    <p>Nome: {{ $extesion->name_ramal }}.</p>
    <p>Tipo: {{ $extesion->type }}.</p>
    <p>Callerid: {{ $extesion->callerid }}.</p>
    <p>Usuário: {{ $user->name }}.</p>

@endsection