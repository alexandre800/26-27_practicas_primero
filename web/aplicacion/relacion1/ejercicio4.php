<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador
const FILAS = 5;
$array = [];

//creación del array
for ($i = 1; $i <= FILAS; $i++) {

    for ($i2 = 0; $i2 < $i; $i2++) {
        $array[] = $i;
    }
}

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4");
cuerpo($array); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($array)
{

    $i = 0;
    foreach ($array as $valor) {
        echo $valor . " ";

        $i++;
        if ($i == $valor) {
            echo "<br>";
            $i = 0;
        }
    }
}
