<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Categoria{

    private $id;
    private $tipo;
    private $descricao;

    public function __construct($id, $tipo, $descricao){
        $this->setId($id);
        $this->setTipo($tipo);
        $this->setDescricao($descricao);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

}