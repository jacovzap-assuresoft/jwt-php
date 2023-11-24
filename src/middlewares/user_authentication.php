<?php

include_once './src/middlewares/authentication_proxy.php';
include_once './src/services/user_service.php';

class UserAuthentication extends AuthenticationProxy
{
    private UserService $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function getAllUsers()
    {
        if ($this->validateAccessToken())
        {
            return $this->service->getAllUsers();
        }
        else
        {
            return ['error' => 'Invalid token'];
        }
    }
}