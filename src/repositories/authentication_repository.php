<?php

include_once './src/config/database.php';

class AuthenticationRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getInstance();
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $this->connection->query($query);

        if ($result === false) {
            die('Error en la consulta SQL: ' . $this->connection->lastErrorMsg());
        }

        $row = $result->fetchArray(SQLITE3_ASSOC);
        $user = new User($row['id'], $row['name'], $row['lastname'], $row['email'], $row['password']);

        return $user;
    }
}