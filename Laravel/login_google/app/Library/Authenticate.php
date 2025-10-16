<?php

    namespace App\Library;

use App\Models\User;

    class Authenticate {

        public function authGoogle($data) {

            $user = new User();

            $userFound = $user->findBy("email", $data->email);

            if(!$userFound) {

                $user->insert([

                    "firstName" => $data->givenName,
                    "lastName" => $data->familyName,
                    "email" => $data->

                ])

            }

        }

    }

?>