<?php

/**
 * Classe que irá implementar a autenticação JWT
 */

namespace App\Controllers;

use App\Models\Auth;

class AuthController
{
    public function post()
    {
        return Auth::login($_POST);
    }

    public static function isAuthenticated()
    {
        $http_header = apache_request_headers();
        if (isset($http_header['Authorization']) && $http_header['Authorization'] != null) {
            $bearer = explode(' ', $http_header['Authorization']);
            // $bearer[0] = 'bearer';
            // $bearer[1] = 'token_jwt';

            $token = explode('.', $bearer[1]);
            $header = $token[0];
            $payload = $token[1];
            $sign = $token[2];

         // Confirm sign
            $valid = hash_hmac('sha256', $header . "." . $payload, '123', true);
            $valid = base64_encode($valid);

            if ($sign === $valid) {
                return true;
            }
        }
        return false;
    }
}
