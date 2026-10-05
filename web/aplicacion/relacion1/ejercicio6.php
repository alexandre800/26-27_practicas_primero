<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador
$vector = array("primera" => 12.56, 24 => true, 67 => 23.76);

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 6");
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
    while ($valor = current($array)) {
        echo key($array) . " => " . $valor . ",  ";
        next($array);
    }

    echo "<br>";

    //recorrer el array_keys y array_values
    $indices = array_keys($array);
    $valores = array_values($array);

    for ($i = 0; $i < count($indices); $i++) {
        echo $indices[$i] . " => ".$valores[$i].",  ";
    }
}
