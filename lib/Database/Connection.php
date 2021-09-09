<?php

namespace Connection;

abstract class Connection
{
    private static $conn;

    public static function getConn()
    {
        if (!self::$conn) {
            self::$conn = new \PDO('mysql: host=localhost; dbname=serie-criando-site;', 'root', 'root');
        }
        return self::$conn;
    }
}
