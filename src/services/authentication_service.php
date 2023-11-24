<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

include_once './src/repositories/authentication_repository.php';

class AuthenticationService
{
    private $authentication_repository;

    public function __construct()
    {
        $this->authentication_repository = new AuthenticationRepository();
    }

    public function login($email, $password)
    {
        $user = $this->authentication_repository->login($email, $password);

        if ($user->getEmail() === null) {
            return ['error' => 'usuario no encontrado'];
        }

        if ($user->getPassword() !== $password) {
            return ['error' => 'email o contrasena incorrecta'];
        }

        $payload = array(
            "iss" => "localhost",
            "aud" => "localhost",
            "exp" => time() + (60 * 60),
            "data" => $user->getUserArray()
        );

        $key = $_ENV['JWT_KEY'];
        $jwt = JWT::encode($payload, $key, 'HS256');

        $user->setPassword("Protected");

        return [ 'data' => $user->getUserArray(), 'x_access_token' =>  $jwt];
    }
}