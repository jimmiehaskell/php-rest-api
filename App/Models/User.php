<?php

namespace App\Models;

class User
{
    private static $table = 'user';

    private static function connPdo()
    {
        $connPdo = new \PDO(DBDRIVE . ': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        return $connPdo;
    }

    public static function getUser(int $id)
    {
        $sql = 'SELECT * FROM ' . self::$table . ' WHERE id = :id';
        $stmt = User::connPdo()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum usuário encontrado.");
        }
    }

    public static function getAllUser()
    {
        $sql = 'SELECT * FROM ' . self::$table;
        $stmt = User::connPdo()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum usuário encontrado.");
        }
    }

    public static function insertNewUser($post)
    {
        $sql = 'INSERT INTO ' . self::$table . '(email, password, name) VALUES (:email_post, :password_post, :name_post)';
        $stmt = User::connPdo()->prepare($sql);
        $stmt->bindValue(':email_post', $post['email']);
        $stmt->bindValue(':password_post', $post['password']);
        $stmt->bindValue(':name_post', $post['name']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Usuário(a) inserido com sucesso.';
        } else {
            throw new \Exception("Falha ao inserir o usuário");
        }
    }
}
