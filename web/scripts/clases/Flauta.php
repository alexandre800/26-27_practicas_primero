<?php
class Flauta extends InstrumentoViento implements iFabricable{

    //constructor privado
    private function __construct($_edad=15, $_material="madera")
    {
        //llamo al constructor padre
        parent::__construct($_edad, $_material);
        
    }

    //constructor estático con parámetro un Array con posiciones asociativas “material” y “edad” 
    //que devuelve una instancia de Flauta
    public static function crearDesdeArray(array $array=["material"=>"madera", "edad"=>15]): static
    {
        $inst = new static($array["edad"], $array["material"]); 
        return $inst; 
    }

    //método de clonado con edad 0 y número de instancia/número de instancias aumentado 
    //pues este método se usará para crear una nueva instancia
    public function __clone() { 
        $this->_edad=0;
        self::$_totalInstrumentos++;
        $this->_ordenCreacion = self::$_totalInstrumentos;
    } 

    //métodos de la interfaz iFabricable
    public function metodoFabricacion(): string{
        return "Se crean en una fábrica especializada";
    }
    public function metodoReciclado(): string{
        return "Se tiran al contenedor de plástico";
    }

}