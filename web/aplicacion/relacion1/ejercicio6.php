<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 1", "ENLACE" => "index.php"],
    ["TEXTO" => "ejercicio 6", "ENLACE" => "ejercicio6.php"]
];

//controlador
$vector = array("primera" => 12.56, 24 => true, 67 => 23.76);

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 6", $barra);
cuerpo($vector); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($array)
{

    //Recorrer el array usando funciones de recorrido
    reset($array); //Coloca el puntero en el primer elemento del array
    while ($valor = current($array)) { //current()=elemento del puntero
        echo key($array) . " => " . $valor . ",  ";//key()=clave
        next($array);//next()=salta al siguiente elemento
    }

    echo "<br>";

    //recorrer el array_keys y array_values
    $indices = array_keys($array);//saca todas las claves a un array
    $valores = array_values($array);//saca todos los valores a un array

    for ($i = 0; $i < count($indices); $i++) {
        echo $indices[$i] . " => ".$valores[$i].",  ";
    }
}
