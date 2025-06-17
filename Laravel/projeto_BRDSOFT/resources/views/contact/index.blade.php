@extends('layout.base')

@section('title', 'Contato')

@section('route', route('index'))

@section('content_main')

    <h1>Contato</h1>

    <form action="{{ route('contact.send') }}" method="POST">

        @csrf
        
        <div>
    
            <label for="name">Nome: </label>
            <input type="text" name="name" id="name">
        
        </div>

        <br>

        <div>

            <label for="email">Email: </label>
            <input type="email" name="email" id="email">

        </div>

        <br>

        <div>

            <label for="subject">Assunto: </label>
            <input type="text" name="subject" id="subject">
    
        </div>

        <br>

        <div>

            <label for="message">Mensagem: </label>
            <br>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>

        </div>

        <br>

        <div>

            <button type="submit">Enviar</button>

        </div>

    </form>

@endsection