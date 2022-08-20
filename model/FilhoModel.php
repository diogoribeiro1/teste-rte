<?php
namespace Model;

use dao\DbConnection;
use dao\FilhoDao;

include_once dirname(__FILE__) . "/../dao/FilhoDao.php";

class FilhoModel
{
    public $idFilho, $idPessoa, $nome;

    private $dao;

    function __construct(){
        $this->dao = new FilhoDao();
    }

    public function save(FilhoModel $filhoModel)
    {
        $this->dao->insertFilho($filhoModel);
    }

    public function selectPessoaAndFilhos()
    {
        return $this->dao->selectPessoaAndFilhos();
    }

    public function delete()
    {
        $this->dao->deleteAllFilhos();
    }

}