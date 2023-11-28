<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

include_once './src/middlewares/service.php';

abstract class AuthenticationProxy extends Service
{
    public function validateAccessToken()
    {
        try
        {
            $token = $_SERVER['HTTP_X_ACCESS_TOKEN'];

            if (!$token) {
                return false;
            }

            $decoded = JWT::decode($token, new Key($_ENV['JWT_KEY'], 'HS256'));

            if ($decoded->exp < time()) {
                return false;
            }

            return true;
        }
        catch (Exception $e)
        {
            return false;
        }
    }
}