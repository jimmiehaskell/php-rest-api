<?php

/**
 * Classe que irá implementar a autenticação JWT
 */

namespace App\Controllers;

class AuthController
{
    public function login()
    {
        var_dump($_POST);
        if ($_POST['email'] === 'teste@gmail.com' && $_POST['password'] === '123') {
            // App key
            $key = '123';

            // Header token
            $header = [
                'typ' => 'JWT',
                'alg' => 'HS256'
            ];

            // Payload - content
            $payload = [
                'name' => 'Jimmie Haskell',
                'email' => 'teste@gmail.com',
            ];

            // JSON
            $header = json_encode($header);
            $payload = json_encode($payload);

            // BASE 64
            $header = base64_encode($header);
            $payload = base64_encode($payload);

            // Sign
            $sign = hash_hmac('sha256', $header . "." . $payload, $key, true);
            $sign = base64_encode($sign);

            // Token
            $token = $header . "." . $payload . "." . $sign;

            return $token;
        }
        throw new \Exception("Não autenticado");
    }
}
