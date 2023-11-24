<?php

class User
{
    private $id;
    private $name;
    private $lastname;
    private $email;
    private $password;

    public function __construct($id, $name, $lastname, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId ()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLastname ()
    {
        return $this->lastname;
    }

    public function getEmail ()
    {
        return $this->email;
    }

    public function getPassword ()
    {
        return $this->password;
    }

    public function setPassword ($password)
    {
        $this->password = $password;
    }

    public function getUserArray ()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'lastname' => $this->getLastname(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword()
        );
    }
}