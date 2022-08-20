<?php
namespace Model;

use dao\DbConnection;
use dao\PessoaDao;

include_once dirname(__FILE__) . "/../dao/PessoaDao.php";

class PessoaModel
{
    public $idPessoa, $nome, $filhos;

    private $dao;

    function __construct(){
        $this->dao = new PessoaDao();
    }

    public function save(PessoaModel $pessoaModel)
    {
        $this->dao->insertPessoa($pessoaModel);
    }

    public function delete()
    {
        $this->dao->deleteAllPessoas();
    }

    public function selectAllPessoas()
    {
        return $this->dao->selectAllPessoas();
    }


}