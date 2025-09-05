<?php

namespace App\Traits;

trait HttpResponses{

    public function response($message, $status, $user){

        return response()->json([

            'messsage' => $message,
            'status' => $status,
            'user' => $user 

        ]);

    }

    public function error($message, $status, $errors){

        return response()->json([

            'messsage' => $message,
            'status' => $status,
            'errors' => $errors

        ]);

    }

}