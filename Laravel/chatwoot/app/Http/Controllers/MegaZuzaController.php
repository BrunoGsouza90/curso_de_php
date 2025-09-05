<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MegaZuzaController extends Controller {

    public function webhook(Request $request) {

        $payload = $request->all();

        if($payload["event"] === "message_created") {

            $message = $payload["data"]["content"] ?? "";

            $conversationId = $payload["data"]["conversation"]["id"] ?? null;

            $accountId = $payload["data"]["account"]["id"] ?? null;


            $response = "Show de bola meu querido!";

            if(stripos($message, "idiota") !== false) {

                $response = "Ei, respeita seu mestre!";

            }

            $domain = env("CHATWOOT_URL");

            $url = "$domain/api/v1/accounts/{$accountId}/conversations/{$conversationId}/messages";

            if($conversationId && $accountId) {

                Http::withToken(env("CHATWOOT_WEBHOOK_TOKEN"))

                    ->post($url, [

                        "content" => $response

                    ]);

                Log::info('Webhook recebido:', $request->all());

            }

        }

        return response()->json (
            
            [
                
                'status' => 'ok'
            
            ], 200
        
        );

    }

}