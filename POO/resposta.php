<?php
    require_once("Aluno.php");
    require_once("AlunoADS.php");
    $a = new Aluno($_POST['nome'], $_POST['idade']);
    //$a->setNome($_POST['nome']);
    //$a->setIdade($_POST['idade']);
    echo "A idade do aluno {$a->getNome()} é {$a->getIdade()}";

    $ads = new AlunoADS($_POST['nome'], $_POST['idade']);
    $ads->infoAluno();


?>