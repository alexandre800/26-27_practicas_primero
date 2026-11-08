<?php

/**
 * Clase normal sin sobrecarga
 */
class ClaseSinsobrecarga{

    public int $numero=10;

    //métodos mágicos para control de la sobrecarga
    public function __set(string $name, mixed $value):void{
        throw new \Exception("La propiedad ".$name."no existe");
    }

    public function __get(string $name)
    {
        throw new \Exception("La propiedad ".$name."no existe");
    }

    public function __isset(string $name): bool
    {
        return false;
    }

    public function __unset(string $name): void
    {
        
    }

}