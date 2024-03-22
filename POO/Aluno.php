<?php
class Aluno{

    function __construct($nome, $idade){
        $this->setNome($nome);
        $this->setIdade($idade);
    }

    protected $nome;
    private $idade;

    function setNome($nome) {
        $this->nome = $nome;
    }

    function getNome(){
        return $this->nome;
    }

    function setIdade($idade){
        if (($idade>0) && ($idade<120))
            $this->idade = $idade;
        else
            $this->idade = 0;
    }

    function getIdade(){
        return $this->idade;
    }

    final function mostrarNomeIdade(){
        return "Meu nome é ... e a idade é ...";
    }
}
?>