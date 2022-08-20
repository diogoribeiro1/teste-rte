<?php

namespace dao;

use Model\PessoaModel;
include_once dirname(__FILE__) . "/../dao/DbConnection.php";

class PessoaDao extends DbConnection
{
    private $table;

    function __construct(){
        parent::__construct();
        $this->table = "pessoa";
    }

    public function insertPessoa(PessoaModel $model)
    {
        $sql = "INSERT INTO $this->table(id_pessoa, pessoa) VALUES (?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->idPessoa);
        $stmt->bindValue(2, $model->nome);

        $stmt->execute();
    }

    public function selectAllPessoas()
    {
        $sql = "SELECT pessoa.id_pessoa as idpessoa, pessoa.pessoa as nome FROM $this->table";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteAllPessoas()
    {
        $sql = "DELETE FROM $this->table WHERE id_pessoa >= 1 AND id_pessoa <= 100";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();
    }


}