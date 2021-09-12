<?php

namespace Connection;

abstract class Connection
{
    private static $conn;

    public static function getConn()
    {
        if (!self::$conn) {
            self::$conn = new \PDO('sqlite:./database/serie-criando-site.db');
        }
        return self::$conn;
    }
}