<?php

namespace App\Database;

use App\Database\Exceptions\DatabaseException;

class CheckaEstruturas extends Database
{
    public function criarTabelas()
    {
        try {
            $this->criaTabelaUsuario();
        } catch (DatabaseException $e) {
            throw new DatabaseException($e->getMessage());
        }
    }

    private function criaTabelaUsuario()
    {
        $query = "CREATE TABLE IF NOT EXISTS sis_usuario(
                    su_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Id do usuário',
                    su_nome VARCHAR(80) DEFAULT NULL COMMENT 'Nome do usuário',
                    su_email VARCHAR(60) NOT NULL COMMENT 'Email do usuário',
                    su_senha VARCHAR(50) NOT NULL COMMENT 'Senha do usuário',
                    su_ativo TINYINT(1) DEFAULT 0 COMMENT '1 - Ativo, 0 - Inativo',
                    su_data_cadastro DATE NOT NULL COMMENT 'Data de cadastro',
                    su_data_alteracao DATE COMMENT 'Data da ultima alteração'
                );";
        $this->execute($query, []);
    }
}
