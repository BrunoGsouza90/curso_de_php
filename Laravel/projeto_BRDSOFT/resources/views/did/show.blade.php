@extends('layout.base')

@section('title', "DID $did->id")

@section('route', route('dids.index'))

@section('content_main')

    <h1>DID - {{ $did->id }}</h1>

    <p>Number: {{ $did->number }}.</p>
    <p>Descrição: {{ $did->description }}.</p>
    <p>Usuário: {{ $user->name }}.</p>

@endsection