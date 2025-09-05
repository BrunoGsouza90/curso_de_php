<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller{
 
    public function index(){

        return view('contact.index');

    }

    public function send(Request $request){

        $user = Auth::user();

        Mail::to('bruno.gsouza199@gmail.com', 'Bruno Gonçalves')->send(new Contact([

            'fromName' => $request->input('name'),
            'fromEmail' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message')

        ]));

        return redirect(route('index'))->with('success', 'Email enviado com sucesso!');

    }

}