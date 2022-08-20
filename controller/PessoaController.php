<?php

include_once dirname(__FILE__) . '/../model/PessoaModel.php';
include_once dirname(__FILE__) . '/../model/FilhoModel.php';
use Model\PessoaModel;
use Model\FilhoModel;

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            gravar();
            break;
        case 'GET':
            ler();
            break;

    }

    function gravar(){
        $array_de_objetos = $_POST;

        $pessoaModel = new PessoaModel();
        $pessoaModel->delete();

        for ($i = 0; $i < count($array_de_objetos['pessoas']); $i++){

            $pessoaModel = new PessoaModel();
            $pessoaModel->idPessoa = $i+1;
            $pessoaModel->nome = $array_de_objetos['pessoas'][$i]['nome'];
            $pessoaModel->save($pessoaModel);

            if (isset($array_de_objetos['pessoas'][$i]['filhos'])){
                for ($j = 0; $j < count($array_de_objetos['pessoas'][$i]['filhos']); $j++){
                    $filhoModel = new FilhoModel();
                    $filhoModel->nome = $array_de_objetos['pessoas'][$i]['filhos'][$j];
                    $filhoModel->idPessoa = $i+1;
                    $filhoModel->save($filhoModel);
                }
            }
        }
    }

    function ler (){
        $pessoaModel = new PessoaModel();
        $arrayPessoas = $pessoaModel->selectAllPessoas();

        $filhoModel = new FilhoModel();
        $arrayFilhos = $filhoModel->selectPessoaAndFilhos();

        $pessoas = array();

        for ($i = 0; $i < count($arrayPessoas); $i++){

            $pessoaModel1 = new PessoaModel();
            $pessoaModel1->idPessoa = $arrayPessoas[$i]['idpessoa'];
            $pessoaModel1->nome = $arrayPessoas[$i]['nome'];
            $pessoaModel1->filhos = array();

            for ($j = 0; $j < count($arrayFilhos); $j++){
                if ($arrayFilhos[$j]['nome'] === $arrayPessoas[$i]['nome']){
                    $filhoModel1 = new FilhoModel();
                    $filhoModel1->idPessoa =  $arrayFilhos[$j]['idpessoa'] + 1;
                    $filhoModel1->nome =  $arrayFilhos[$j]['filhos'];
                    $pessoaModel1->filhos[] = $arrayFilhos[$j]['filhos'];
                }
            }
            $pessoas[] = $pessoaModel1;
        }
        echo json_encode($pessoas);
    }

    ?>