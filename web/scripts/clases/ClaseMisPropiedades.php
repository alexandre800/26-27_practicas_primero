<?php

class ClaseMisPropiedades implements Iterator{

    //Propiedad pública
    public mixed $propPublica;
    
    //Propiedad privada
    private mixed $_propPrivada=25;

    //Constructor público
    public function __construct(){
        
    }

    //-----------------------------
    //métodos mágicos para control de la sobrecarga
    public function __set(string $name, mixed $value): void
    {
        if($name==="_propPrivada")
            throw new \Exception("La propiedad " . $name . " no es accesible");
    }

    public function __get(string $name): mixed
    {
        if($name==="_propPrivada")
            throw new \Exception("La propiedad " . $name . " no es accesible");

        // if(!isset($name))
            //throw new \Exception("La propiedad ".$name." no existe");

        return 25;
    }

    public function __isset(string $name): bool
    {
        return false;
    }

    public function __unset(string $name): void {}

    //----------------------------
    //MÉTODOS DE LA INTERFAZ ITERATOR
    public function rewind():void {
        //$this->_claveActual=0;
    }
    public function current():mixed {
        return 0;
    }
    //devuelve la clave correspondiente a la posicion actual
    public function key():mixed {
        //return $this->_claveActual;
        return 0;
    }
    //mueve el puntero a la siguiente posicion
    public function next():void {
        //$this->_claveActual++;
    }
    //comprueba si la posición actual es valida
    public function valid():bool {
        return true;
    }

}