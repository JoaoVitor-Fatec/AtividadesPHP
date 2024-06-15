<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\AlunosDAO;
use Php\Primeiroprojeto\Models\Domain\Alunos;

class AlunosController {

    //alerts das funções
    public function index($params){
        $alunosDAO = new AlunosDAO();
        $resultado = $alunosDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true")
            $mensagem = "Registro inserido com sucesso!";
        elseif($acao == "inserir" && $status == "false")
            $mensagem = "Erro ao inserir!";
        elseif($acao == "alterar" && $status == "true")
            $mensagem = "Registro alterado com sucesso!";
        elseif($acao == "alterar" && $status == "false")
            $mensagem = "Erro ao alterar!";
        elseif($acao == "excluir" && $status == "true")
            $mensagem = "Registro excluído com sucesso!";
        elseif($acao == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!";
        else 
            $mensagem = "";
        require_once("../src/Views/alunos/alunos.php");
    }
    
    //diretorio de inserir
    public function inserir($params){
        require_once("../src/Views/alunos/inserir_alunos.html");
    }

    public function novo($params){
        $alunos = new Alunos(0, $_POST['nome'], $_POST['ra']);
        $alunosDAO = new AlunosDAO();
        if ($alunosDAO->inserir($alunos)){
            header("location: /alunos/inserir/true");
        } else {
            header("location: /alunos/inserir/false");
        }
    }

    //diretorio de alterar
    public function alterar($params){
        $alunosDAO = new AlunosDAO();
        $resultado = $alunosDAO->consultar($params[1]);
        require_once("../src/Views/alunos/alterar_alunos.php");
    }

    //diretorio de excluir
    public function excluir($params){
        $alunosDAO = new AlunosDAO();
        $resultado = $alunosDAO->consultar($params[1]);
        require_once("../src/Views/alunos/excluir_alunos.php");
    }

    //diretorio de alterar
    public function editar($params){
        $alunos = new Alunos($_POST['id'], $_POST['nome'], $_POST['ra']);
        $alunosDAO = new AlunosDAO();
        if ($alunosDAO->alterar($alunos)) {
            header("location: /alunos/alterar/true");
        } else {
            header("location: /alunos/alterar/false");
        }
    }

    public function deletar($params){
        $alunosDAO = new AlunosDAO();
        if ($alunosDAO->excluir($_POST['id'])){
            header("location: /alunos/excluir/true");
        } else {
            header("location: /alunos/excluir/false");
        }
    }

}

