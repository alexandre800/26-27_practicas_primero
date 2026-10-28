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

    $inst1 = new InstrumentoViento();
    $inst2 = new InstrumentoViento(3, "plástico");
    $inst3 = Flauta::crearDesdeArray();
    $inst4 = clone $inst3;

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

    echo $inst1;
    echo ": ".$inst1->afinar()."<br>";
    echo "Voy a tocar un poco de ".$inst1->getDescripcion().": ".$inst1->sonido()."<br><br>";
    $inst2->envejecer();
    echo $inst2;


    echo "<br><br><h1>Ejercicio 4</h1>";
    echo $inst3."<br><br>";
    echo $inst4;

}
