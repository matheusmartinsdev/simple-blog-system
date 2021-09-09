<?php

namespace Comentario;

use Connection\Connection;

class Comentario
{
    public static function selectComments($postId)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM comentario WHERE id_postagem = :postId";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':postId', $postId, \PDO::PARAM_INT);
        $sql->execute();

        $results = array();

        while ($row = $sql->fetchObject('\Comentario\Comentario')) {
            $results[] = $row;
        }

        return $results;
    }
}
