<?php
declare(strict_types=1);
/*
    Classe Funcionário
*/
class Funcionario{    
    /**
     * base do constructor
     * @return void
     */
    public function __construct
    (
        private int $codigo, 
        private string $nome, 
        private float $salarioBase
    ) {

    }
    /**
     * função nome
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }
    /**
     * função tipo
     * @return int
     */
    public function getCodigo() {
        return $this->codigo;
    }
    /**
     * get salario base
     * @return float
     */
    public function getSalarioBase() {
        return $this->salarioBase;
    }
    /**
     * set salario base
     * @param  float $salarioBase
     * @return self
     */
    public function setSalarioBase($salarioBase) {
        $this->salarioBase = $salarioBase;
        return $this;
    }   
    /**
     * get salario liquido
     * @return float
     */
    public function getSalarioLiquido() {
        $inss = $this->salarioBase * 0.1;
        $ir = 0.0;
        if ($this->salarioBase > 2000.0) {
            $ir = ($this->salarioBase - 2000.0) * 0.12;
        }
        return $this->salarioBase - $inss - $ir;
    }
    /**
     * retorna tudo em formato string
     * @return string
     */
    public function __toString() {
        return get_class($this) . "\n Codigo: " . 
        $this->getCodigo() . "\n Nome: " . 
        $this->getNome() . "\n Salario Base: " . 
        $this->getSalarioBase() . "\n Salario liquido: " . 
        $this->getSalarioLiquido();
    }
}

class Servente extends Funcionario{    
    /**
     * override
     * @return float
     */
    public function getSalarioLiquido(){
        return parent::getSalarioLiquido() + (5/100 * $this->getSalarioBase() );       
    }
}
class Motorista extends Funcionario{
    public function __construct(
        int $codigo, 
        string $nome, 
        float $salarioBase,
        private string $cnh
    ){
        parent::__construct($codigo, $nome, $salarioBase);
    }    
    /**
     * get numero da cnh atual
     * @return string
     */
    public function getCnh(){
        return $this->cnh;
    }    
    /**
     * set nova cnh
     *
     * @param  string $cnh
     * @return self
     */
    public function setCnh(string $cnh){
        $this->cnh = $cnh;
        return $this;
    }
}
class MestreDeObras extends Servente
{    
    /**
     * __construct
     * @return void
     */
    public function __construct(
        int $codigo, 
        string $nome, 
        float $salarioBase,
        private int $totalGrupo,
    ){
        parent::__construct($codigo, $nome, $salarioBase);
    }    
    /**
     * set grupo atual
     * @param  int $totalGrupo
     * @return self
     */
    public function setQtdGrupo(int $totalGrupo){
        $this->totalGrupo = $totalGrupo;
        return $this;
    }    
    /**
     * get total em grupo
     * @return int
     */
    public function getQtdGrupo(){
        return $this->totalGrupo;
    }    
    /**
     * getSalarioLiquido
     * @return float
     */
    public function getSalarioLiquido(){
        if ($this->totalGrupo >= 10) {
            $base =  (10/100 * parent::getSalarioLiquido()) * (int) $this->totalGrupo /10;  
            return $base + parent::getSalarioLiquido();
            //return (int) $this->totalGrupo / 10 * parent::getSalarioLiquido();
        }
        return parent::getSalarioLiquido();
    }
}
function render(Funcionario $functionario){
    echo "===== Apresentação dos Salarios  ======= \n";
    echo "Nome: ". $functionario->getNome()."\n";
    echo "Tipo: ". get_class($functionario) ."\n";
    echo "Salario: ". $functionario->getSalarioLiquido()."\n\n";

}


$mestre = new MestreDeObras(2, 'Felipe', 2000, 40);
$motorista = new Funcionario(1, 'João', 100);
$servente = new Servente(2, 'Miguel', 500);

render($mestre);
render($motorista);
render($servente);