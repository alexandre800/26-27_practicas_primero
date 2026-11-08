<?php
/**
 * Clase iterable que permite crear y gestionar propiedades dinámicas,
 * almacenándolas en un array privado y recorriéndolas mediante la interfaz
 * Iterator.
 */
class ClaseMisPropiedades implements Iterator
{

    //Array privado donde se almacenan las propiedades dinámicas
    private array $_propiedades = [];

    //propiedad pública y privada
    public mixed $propPublica;
    private mixed $_propPrivada = 25;

    private array $iteracion = [];
    private int $posicion = 0;

    //----------------------------------
    //Métodos mágicos para control de la sobrecarga

    /*el método mágico __set se ejecuta automáticamente cuando intentamos 
    asignar una propiedad inexistente o inaccesible*/
    public function __set(string $nombre, mixed $valor): void{
        // Impedir crear dinámicamente una propiedad llamada _propPrivada
        if ($nombre === "_propPrivada") {
            throw new Exception("No se puede acceder a la propiedad privada _propPrivada");
        }

        //si el nombre no es _propPrivada, se crea una propiedad dinámica que entra en el array
        $this->_propiedades[$nombre] = $valor;
    }

    /*__get se ejecuta automáticamente cuando intentamos 
    leer una propiedad inexistente o inaccesible*/
    public function __get(string $nombre): mixed{
        //si existe una propiedad en el array cuya clave sea igual al parámetro nombre,
        //devuelve la propiedad 
        if (array_key_exists($nombre, $this->_propiedades)) {
            return $this->_propiedades[$nombre];
        }

        throw new Exception("La propiedad '$nombre' no existe o no es accesible");
    }

    //---------------------------------
    //Métodos de Iterator

    //este es el primer método que se llama al hacer un foreach, y devuelve el iterador
    //al primer elemento
    public function rewind(): void{
        $this->iteracion = [];//vacía el array de iteración

        //lo rellena con el array de propiedades, pero añadiendole "oi_"
        foreach ($this->_propiedades as $clave => $valor) {
            $this->iteracion["oi_" . $clave] = $valor;
        }

        // Añade las dos últimas propiedades con "oi_"
        $this->iteracion["oi_propPublica"] = $this->propPublica;
        $this->iteracion["oi__propPrivada"] = $this->_propPrivada;

        //Pone la posición a 0
        $this->posicion = 0;
    }

    //array_values devuelve todos los valores de las propiedades
    //del array, al especificar la posición, devuelve el que necesitamos
    public function current(): mixed{
        return array_values($this->iteracion)[$this->posicion];
    }

    //lo mismo que el anterior método, pero con las claves
    public function key(): mixed{
        return array_keys($this->iteracion)[$this->posicion];
    }

    public function next(): void{
        $this->posicion++;
    }

    //la posición será válida si es menor que la longitud del array
    public function valid(): bool{
        return $this->posicion < count($this->iteracion);
    }
}