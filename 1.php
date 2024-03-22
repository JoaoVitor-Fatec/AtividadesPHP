<?php
declare(strict_types=1);
class Ponto
{
    private static $instances = 0;
    public function __construct(
        private int $x, 
        private int $y
    ){
        self::$instances++;
    }    
    /**
     * @return int
     */
    public function getX(){
        return $this->x;
    }    
    /**
     * @return int
     */
    public function getY(){
        return $this->y;
    }    
    /**
     * @param  mixed $x
     * @return self
     */
    public function setX(int $x){
        $this->x = $x;
        return $this;
    }    
    /**
     * @param  int $y
     * @return self
     */
    public function setY(int $y){
        $this->y = $y;
        return $this;
    }    
    /**
     * @return int
     */
    public static function getTotalInstances(){
        return self::$instances;
    }    
    /**
     * @param Ponto $point
     * @return float
     */
    public function calculeDistance(Ponto $point){
       return sqrt($this->sum($point));
    }    
    /**
     * @param Ponto $point
     * @return int
     */
    private function sum(Ponto $point){
        return $this->diff($point, $this, 'X') + $this->diff($point, $this, 'Y');
    }    
    /**
     * @param Ponto $point
     * @param Ponto $myself
     * @param string $attrname
     * @return int
     */
    private function diff(Ponto $point, Ponto $myself, string $attrname){
        $call = 'get'.$attrname;
        return pow($point->$call() - $myself->$call(),2);
    }

}
try{
    
    $ponto1 = new Ponto(1, 2);
    $ponto2 = new Ponto(2, 2);
    echo $ponto2->calculeDistance($ponto1);
}catch(\Error $e){
    echo "Erro fatal: ".$e->getMessage();
    echo "\n Linha: ". $e->getLine();
}catch(\Exception $e){
    echo "Erro fatal: ".$e->getMessage();
    echo "\n Linha: ". $e->getLine();
}

