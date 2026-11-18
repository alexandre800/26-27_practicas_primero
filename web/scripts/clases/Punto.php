<?php

class Punto{

    //constante pública de clase COLORES
    public const COLORES = [
        "black"=>["nombre"=>"negro", "rgb" =>[0,0,0]],
        "red"=>["nombre"=>"rojo", "rgb" =>[255,0,0]],
        "blue"=>["nombre"=>"azul", "rgb" =>[0,0,255]],
        "green"=>["nombre"=>"verde", "rgb" =>[0,255,0]]
    ];

    //constante pública de clase GROSORES
    public const GROSORES = [
        1=>"fino",
        2=>"medio",
        3=>"grueso"
    ];

    //propiedades privadas
    private int $_x;
    private int $_y;
    private string $_color;
    private int $_grosor;

    /**
     * Inicializa las propiedades usando set, si algún set da false,
     * lanza una excepción
     *
     * @param integer $x
     * @param integer $y
     * @param string $color
     * @param integer $grosor
     */
    public function __construct(int $x, int $y, string $color, int $grosor)
    {
        if(!$this->setX($x))
            throw new Exception("Fallo en coordenada X");
        if(!$this->setY($y))
            throw new Exception("Fallo en coordenada Y");
        if(!$this->setColor($color))
            throw new Exception("Color no válido");
        if(!$this->setGrosor($grosor))
            throw new Exception("Grosor no válido");
    }

    //Métodos get
    public function getX(){
        return $this->_x;
    }
    public function getY(){
        return $this->_y;
    }
    public function getColor(){
        return $this->_color;
    }
    public function getGrosor(){
        return $this->_grosor;
    }

    //Métodos set
    public function setX(int $x): bool{
        if(validaEntero($x, 0, 20000, 0)){
            $this->_x=$x;
            return true;
        }

        return false;
    }
    public function setY(int $y): bool{
        if(validaEntero($y, 0, 20000, 0)){
            $this->_y=$y;
            return true;
        }

        return false;
    }
    public function setColor(string $color): bool{
        if(validaExpresion($color, "/[black|red|green|blue]/", "red")){
            $this->_color=$color;
            return true;
        }

        return false;
    }
    public function setGrosor(int $grosor): bool{
        if(validaEntero($grosor, 1, 3, 1)){
            $this->_grosor=$grosor;
            return true;
        }

        return false;
    }

    //Métodos para controlar la creación de propiedades dinámicas
    //(no se pueden crear)
    public function __get(string $name)
    {
        throw new \Exception("La propiedad ".$name."no existe");
    }
    public function __set(string $name, mixed $value): void
    {
        throw new \Exception("La propiedad ".$name."no existe");
    }
    public function __isset(string $nombre): bool {return false;}

}