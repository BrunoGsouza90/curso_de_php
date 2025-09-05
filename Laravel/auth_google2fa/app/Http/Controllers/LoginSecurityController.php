<?php

namespace App\Http\Controllers;

use App\Models\LoginSecurity as ModelsLoginSecurity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class LoginSecurityController extends Controller {

    public function show2faForm(Request $request) {

        $user = FacadesAuth::user();

        $google2fa_url = "";

        $secret_key = "";

        if($user->loginSecurity()->exists()) {

            $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

            $google2fa_url = $google2fa->getQRCodeInline(

                'Pabx',
                $user->email,
                $user->loginSecurity->google2fa_secret

            );

            $secret_key = $user->loginSecurity->google2fa_secret;

        }

        $data = [

            'user' => $user,
            'secret' => $secret_key,
            
            'google2fa_url' => $google2fa_url
        ];

        return view('auth.2fa_settings')->with('data', $data);

    }

    public function generate2faSecret(Request $request) {
        
        $user = FacadesAuth::user();

        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

        $login_security = ModelsLoginSecurity::firstOrNew(array('user_id' => $user->id));

        $login_security->user_id = $user->id;

        $login_security->google2fa_enable = 0;

        $login_security->google2fa_secret = $google2fa->generateSecretKey();

        $login_security->save();

        return redirect('/2fa')->with('success',"Chave gerada com sucesso!");

    }


    public function enable2fa(Request $request) {

        $user = FacadesAuth::user();

        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

        $secret = $request->input('secret');

        $valid = $google2fa->verifyKey($user->loginSecurity->google2fa_secret, $secret);

        if($valid) {

            $user->loginSecurity->google2fa_enable = 1;

            $user->loginSecurity->save();

            return redirect('2fa')->with('success',"2FA ativada com sucesso!");

        } else {

            return redirect('2fa')->with('error',"Chave inválida, tente novamente!");

        }
    }

    public function disable2fa(Request $request) {
        
        if(!(Hash::check($request->get('current-password'), FacadesAuth::user()->password))) {

            return redirect()->back()->with("error","Your password does not matches with your account password. Please try again.");
            
        }

        $validatedData = $request->validate([

            'current-password' => 'required',

        ]);

        $user = FacadesAuth::user();

        $user->loginSecurity->google2fa_enable = 0;

        $user->loginSecurity->save();

        return redirect('/2fa')->with('success',"2FA agora está desabilidado!");

    }

}