<?php

abstract class InstrumentoBase
{
    //descripcion privada no directamente accesible
    private string $_descripcion;

    //edad protegida y por defecto a 10
    protected int $_edad = 10;

    // Variable de clase inicializada a 0
    protected static int $_totalInstrumentos = 0;

    // Orden de creación de la instancia
    protected int $_ordenCreacion;

    //Se llama al constructor cada vez que se crea una instancia de la clase,
    //inicializo todas las variables aquí
    public function __construct(string $_descripcion, int $_edad = 10)
    {
        $this->_descripcion = $_descripcion;
        $this->_edad = $_edad;

        //al crearse un instrumento, se añade uno a estas variables
        self::$_totalInstrumentos++;
        $this->_ordenCreacion = self::$_totalInstrumentos;
    }

    // Getters y setters de descripcion
    public function getDescripcion(): string
    {
        return $this->_descripcion;
    }

    public function setDescripcion(string $_descripcion): void
    {
        $this->_descripcion = $_descripcion;
    }

    // Get de edad
    public function getEdad(): int
    {
        return $this->_edad;
    }

    // Envejecer un año
    public function envejecer(): void
    {
        $this->_edad++;
    }

    // Métodos abstractos
    public abstract function sonido(): string;
    public abstract function afinar(): string;
    // public function sonido(): string{ return "do re mi"; }
    // public function afinar(): string{ return "Instrumento ".$this->_ordenCreacion." afinado"; }

    //el método toString se ejecuta automáticamente al imprimir una instancia de la clase,
    //lo modifico para mostrar sus variables y su clase
    public function __toString(): string
    {
        return "Instrumento con descripción {$this->_descripcion}, "
            . "instancia {$this->_ordenCreacion} de un total de "
            . self::$_totalInstrumentos . ". Tiene {$this->_edad} años. "
            . "La clase es " . get_class($this);
    }
}