<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");


$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 1", "ENLACE" => "index.php"],
    ["TEXTO" => "ejercicio 4", "ENLACE" => "ejercicio4.php"]
];
//controlador
const FILAS = 5;
$array = [];

//creación del array
for ($i = 1; $i <= FILAS; $i++) {

    //$i2 empieza en 0, aumenta 1 en cada vuelta, y añade $i al array hasta que iguale esa variable  
    for ($i2 = 0; $i2 < $i; $i2++) {
        $array[] = $i;
    }
}

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4", $barra);
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
        //si $i es igual al valor, hay un salto de línea para que se muestre el array en el formato escalera
        if ($i == $valor) {
            echo "<br>";
            $i = 0;
        }
    }
}
