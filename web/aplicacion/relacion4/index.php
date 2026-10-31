<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 4", "ENLACE" => "index.php"],
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relación 4", $barra);
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo()
{

    echo "<h1>Ejercicio 1</h1>";
    echo "Clase InstrumentoBase creada";
    // $inst1 = new InstrumentoBase("guitarra");
    // $inst2 = new InstrumentoBase("flauta", 2);

    // $inst1->envejecer();
    // echo $inst1 . "<br>";
    // echo $inst1->afinar()."<br>";
    // echo "Voy a tocar un poco de ".$inst1->getDescripcion().": ".$inst1->sonido()."<br><br>";

    // echo $inst2;
    // echo "<br>Voy a cambiar el nombre de ".$inst2->getDescripcion()." a piano: ";
    // $inst2->setDescripcion("piano");
    // echo $inst2->getDescripcion();


    echo "<br><br><h1>Ejercicio 2</h1>";
    echo "Interfaz iFabricable creada";


    echo "<br><br><h1>Ejercicio 3</h1>";

    //Creo los instrumentos
    $inst1 = new InstrumentoViento();
    $inst2 = new InstrumentoViento(3, "plástico");
    $inst3 = Flauta::crearDesdeArray();
    $inst4 = clone $inst3;

    echo $inst1;
    echo ": " . $inst1->afinar() . "<br>";
    echo "Voy a tocar un poco de " . $inst1->getDescripcion() . ": " . $inst1->sonido() . "<br><br>";
    $inst2->envejecer();
    echo $inst2;


    echo "<br><br><h1>Ejercicio 4</h1>";
    echo $inst3 . "<br><br>";
    echo $inst4;


    echo "<br><br><h1>Ejercicio 5</h1>";

    //Obtengo un estado civil aleatorio para crear la persona
    $estado=estadoCivilAleatorio();
    //creo la persona
    $persona = Persona::registrarPersona(
        "Pedro",
        "C/Infante 10",
        "10/12/2002",
        "Málaga",
        $estado
    );

    echo $persona;


    echo "<br><br><h1>Ejercicio 6</h1>";

    //genero la serie de fibonacci de 10 creando una instancia
    foreach(new SerieFibonacci(10) as $valor) { 
        echo "$valor &nbsp;"; 
    }
    
    //genero la serie de fibonacci de 10 usando el método de clase fFibonacci
    echo "<br><br>";
    foreach(SerieFibonacci::fFibonacci(10) as $valor){
        echo "$valor &nbsp;"; 
    }


    echo "<br><br><h1>Ejercicio 7</h1>";
    $Objeto= new ClaseMisPropiedades (); 
    $Objeto->propPublica="publica"; 
    //$Objeto->_propPrivada="privada"; //no es valida al ser privada 
    $Objeto->propiedad1=25; 
    $Objeto->propiedad2="cadena de texto"; 
    echo "la propiedad 1 vale ".$Objeto->propiedad1."<br>";
    echo $Objeto->propiedad3; // esto debería dar un error al no haber asignado previamente la propiedad 

}

/**
 * función que obtiene un estado civil a partir de un número aleatorio entre 1 y 4
 *
 * @return enum EstadoCivil
 */
function estadoCivilAleatorio(){
    $aleatorio=mt_rand(1,4);
    switch($aleatorio){
        case 1: $aleatorio=10; break;
        case 2: $aleatorio=20; break;
        case 3: $aleatorio=30; break;
        case 4: $aleatorio=40; break;
    }
    $casos=EstadoCivil::casos();
    $estado=EstadoCivil::casado;

    //el caso de los 4 posibles que tenga el mismo valor que el número,
    //es el que obtiene y devuelve la función
    foreach($casos as $caso){
        if($caso->valor()===$aleatorio)
            $estado=$caso;
    }

    return $estado;
}