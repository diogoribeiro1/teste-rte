<?php
namespace dao;

use PDO;
use Model\PessoaModel;
use Model\FilhoModel;

class DbConnection
{
    protected $conexao;

    public function __construct()
    {
        try{
            $dsn = "mysql:host=localhost:3306;dbname=teste-rte";

            $this->conexao = new PDO($dsn, 'root', '123');
        }catch (\PDOException $e){
            echo 'Erro: '.$e->getMessage();
            die();
        }

    }

}