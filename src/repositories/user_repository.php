<?php

include_once './src/config/database.php';
include_once './src/Models/user_model.php';

class UserRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getInstance();
    }

    public function getAllUsers ()
    {
        $sql = "SELECT * FROM users";
        $result = $this->connection->query($sql);

        if ($result === false) {
            die('Error en la consulta SQL: ' . $this->connection->lastErrorMsg());
        }

        $users = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $user = new User($row['id'], $row['name'], $row['lastname'], $row['email'], 'Protected');
            $user_array = $user->getUserArray();
            array_push($users, $user_array);
        }

        return $users;
    }
}