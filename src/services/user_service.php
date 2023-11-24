<?php

include_once './src/middlewares/service.php';
include_once './src/repositories/user_repository.php';

class UserService implements Service
{
    private $user_repository;

    public function __construct()
    {
        $this->user_repository = new UserRepository();
    }

    public function getAllUsers()
    {
        return $this->user_repository->getAllUsers();
    }
}
