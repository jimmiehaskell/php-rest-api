<?php

namespace App\Models;

class Auth
{
    public static function login($post)
    {
        // Os valores no 'if' devem ser os mesmo passados no arquivos 'client_jwt.html'
        if ($post['email'] === '' && $post['password'] === '') {
            // App key
            $key = '123';

            // Header token
            $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
            ];

            // Payload - content
            $payload = [
            'name' => $post['name'],
            'email' => $post['email'],
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
