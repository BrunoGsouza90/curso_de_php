<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller {
 
    public function home() {

        $user = Auth::user();

        $identifier = $user->id;

        $identifierHash = hash_hmac('sha256', $identifier, env('CHATWOOT_INBOX_IDENTIFIER_KEY'));

        return view("home", compact("user", "identifier", "identifierHash"));

    }

}