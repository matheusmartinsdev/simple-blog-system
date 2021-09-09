<?php

namespace Postagem;

use Comentario\Comentario;
use Connection\Connection;
use Exception;

class Postagem
{
    public static function selecionaTodos()
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM postagem ORDER BY id DESC";
        $sql = $conn->prepare($sql);
        $sql->execute();

        // $result = array();

        while ($row = $sql->fetchObject("\Postagem\Postagem")) {
            $result[] = $row;
        }

        if (!$result) {
            throw new Exception("Não foi encontrado nenhum registro");
        }

        return $result;
    }

    public static function selecionarPorId($postId)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM postagem WHERE id = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':id', $postId, \PDO::PARAM_INT);
        $sql->execute();

        $result = $sql->fetchObject("\Postagem\Postagem");

        if (!$result) {
            throw new Exception('Não foi encontrada nenhuma postagem!');
        } else {
            $result->comments = Comentario::selectComments($result->id);
        }

        return $result;
    }
}
