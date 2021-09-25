<?php

namespace App\Database;

use \App\Database\Exceptions\ConexaoException;
use PDO;
use PDOException;

class Conexao
{
    private static $pdo;

    public function __construct()
    {
    }

    public static function conectar()
    {
        try {
            if (!isset(self::$pdo)) {
                self::$pdo = new PDO("mysql:host=localhost:3306;dbname=php_mvc", "root", "root");
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$pdo;
        } catch (PDOException $p) {
            throw new ConexaoException($p->getMessage());
        }
    }
}
