<?php
class Persona{

    //propiedades privadas
    private string $_nombre;
    private string $_domicilio;
    private string $_fechaNacimiento;
    private string $_localidad;
    private EstadoCivil $_estado;

    //constructor privado sin parámetros
    private function __construct(){
        
        $this->_nombre="prueba";
        $this->_domicilio="carrera 12";
        $this->_fechaNacimiento="01/01/2000";
        $this->_localidad="antequera";
        $this->_estado=EstadoCivil::soltero;

    }

    //Métodos get y set para todas las propiedades
    public function getNombre(){
        return $this->_nombre;   
    }
    public function setNombre($_nombre){
        $this->_nombre=$_nombre;
    }
    public function getDomicilio(){
        return $this->_domicilio;   
    }
    public function setDomicilio($_domicilio){
        $this->_domicilio=$_domicilio;
    }
    public function getFechaNacimiento(){
        return $this->_fechaNacimiento;   
    }
    public function setFechaNacimiento($_fechaNacimiento){
        $this->_fechaNacimiento=$_fechaNacimiento;
    }
    public function getLocalidad(){
        return $this->_localidad;   
    }
    public function setLocalidad($_localidad){
        $this->_localidad=$_localidad;
    }
    public function getEstadoCivil(){
        return $this->_estado;   
    }
    public function setEstadoCivil($_estado){
        $this->_estado=$_estado;
    }

    //constructor estático, con todos los parámetros
    public static function registrarPersona($_nombre, $_domicilio, $_fechaNacimiento,
        $_localidad, $_estado){

        $persona = new static();
        $persona->setNombre($_nombre);
        $persona->setDomicilio($_domicilio);
        $persona->setFechaNacimiento($_fechaNacimiento);
        $persona->setLocalidad($_localidad);
        $persona->setEstadoCivil($_estado);

        return $persona;
    }

    //Método toString para mostrar una instancia de persona
    public function __toString():string
    {
        //$this->getEstadoCivil().descripcion()
        return $this->getNombre()." es una persona ".$this->getEstadoCivil()->descripcion().
        " nacida en ".$this->getFechaNacimiento()." y que vive en ".$this->getDomicilio().
        ", ".$this->getLocalidad() ;
    }

}