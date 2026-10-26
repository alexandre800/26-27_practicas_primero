<?php


class InstrumentoViento extends InstrumentoBase
{

    //propiedad de instrumentoViento, por defecto madera
    protected string $_material = "madera";


    //al constructor le llega la edad y el material (las dos con valores por defecto)
    public function __construct($_edad=15, $_material="madera")
    {
        //llamo al constructor padre con la nueva edad y una descripción fija
        parent::__construct("instrumento de viento", $_edad);
        
        //inicializo el material
        $this->_material=$_material;
    }

    //Métodos abstractos de la clase padre definidos en la clase hija
    public function sonido(): string{
        return "do re mi";
    }
    public final function afinar(): string{//al ser final, las clases hijas no pueden redefinir el método
        return "instrumento afinado";
    }

    //se llama al toString de la clase padre, y se completa con la propiedad material de la clase hija
    public function __toString(): string{
        return parent::__toString().". Instrumento de material {$this->_material}.";
    }

}