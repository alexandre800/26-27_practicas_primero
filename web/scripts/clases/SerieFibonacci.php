<?php
class SerieFibonacci implements Iterator{

    //propiedades privadas
    private int $_limite;
    private int $_claveActual;

    //constructor público
    public function __construct(int $_limite){
        $this->_limite=$_limite;
        $this->_claveActual=0;
    }

    //función estática que devuelve la serie de fibonacci usando un generador
    public static function fFibonacci(int $ultimo){
        yield 0;
        
        if($ultimo!=0)//comprobación para que no devuelva 0 y 1 si es el fib(0)
            yield 1;

        for($i=2; $i<=$ultimo; $i++){
            yield (1/sqrt(5))*pow((1+sqrt(5))/2, $i)-(1/sqrt(5))*pow((1-sqrt(5))/2, $i);
        }

    }

    //----------------------------
    //MÉTODOS DE LA INTERFAZ ITERATOR
    //pone el puntero al valor inicial
    public function rewind():void {
        $this->_claveActual=0;
    }
    //devuelve el contenido correspondiente a la posición actual
    public function current():mixed {
        if($this->_claveActual===0)
            return 0;
        if($this->_claveActual===1)
            return 1;
        
        //si la clave no es ni 0 ni 1, devuelve el resultado de la formula:
        return (1/sqrt(5))*pow((1+sqrt(5))/2, $this->_claveActual)-(1/sqrt(5))*pow((1-sqrt(5))/2, $this->_claveActual);
    }
    //devuelve la clave correspondiente a la posicion actual
    public function key():mixed {
        return $this->_claveActual;
    }
    //mueve el puntero a la siguiente posicion
    public function next():void {
        $this->_claveActual++;
    }
    //comprueba si la posición actual es valida
    public function valid():bool {
        //es válida si es mayor o igual a 0 y menor o igual al límite
        return($this->_claveActual<=$this->_limite && $this->_claveActual>=0);
    }

}