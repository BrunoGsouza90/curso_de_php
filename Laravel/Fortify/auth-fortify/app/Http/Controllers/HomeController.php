<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    public function home(Request $request) {

        if(session("confirmar_senha") != "confirmado") {

            session(['confirmar_senha' => 'confirmar_senha']);

            $qrCode = "";

        }
        
        if(!empty(Auth::user()->two_factor_secret)){

            $qrCode = Auth::user()->twoFactorQrCodeSvg();

        } else {

            $qrCode = "";

        }

        return view("auth.two-factor-challenge", compact("qrCode"));

    }

}