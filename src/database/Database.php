<?php

namespace App\Database;

use App\Database\Exceptions\DatabaseException;

abstract class Database
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::conectar();
    }
    public function execute(String $query, array $params)
    {
        try {
            $stmt = $this->pdo->prepare($query, $params);
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw new DatabaseException($e->getMessage());
        }
    }
}
