<?php

class DBConnection {
    private static $connection = null;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        if(DBConnection::$connection == null) {
            $connection = new SQLite3('database.db');
        }
        return $connection;
    }
}
