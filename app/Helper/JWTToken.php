<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken {

    public static function createToken($userId,$userEmail,$role){
        $key = env('JWT_KEY');

        $payload = [
            'iss' => 'Laravel',
            'iat'=> time(),
            'exp' => time() + 60 * 60,
            'role'=>$role,
            'user_id' => $userId,
            'user_email' => $userEmail
        ];

        return JWT::encode($payload, $key,'HS256');
    }

    public static function verifyToken($token){

        if ($token == null) {
            return 'unauthorized';
        }

        try {
            $key = env('JWT_KEY');
            $decoded = JWT::decode($token,new Key($key,'HS256'));
            return $decoded;
        } catch (Exception $e) {
            return "unauthorized";
        }
    }
}
