<?php

namespace dao;

use Model\FilhoModel;
include_once dirname(__FILE__) . "/../dao/DbConnection.php";


class FilhoDao extends DbConnection
{
    private $table;

    function __construct(){
        parent::__construct();
        $this->table = "filho";
    }

    public function insertFilho(FilhoModel $model)
    {
        $sql = "INSERT INTO $this->table(id_pessoa, nome) VALUES (?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->idPessoa);
        $stmt->bindValue(2, $model->nome);

        $stmt->execute();
    }


    public function selectPessoaAndFilhos()
    {
        $sql = "SELECT pessoa.id_pessoa as idpessoa , pessoa.pessoa as nome, filho.id_filho as idfilho, filho.nome as filhos FROM pessoa INNER JOIN filho ON filho.id_pessoa = pessoa.id_pessoa";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }



    public function deleteAllFilhos()
    {
        $sql = "DELETE FROM $this->table WHERE id_filho >= 1 AND id_filho <= 100";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();
    }

}