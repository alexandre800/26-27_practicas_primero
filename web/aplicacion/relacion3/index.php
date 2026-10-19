<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include_once("libreria.php");

$barra = [
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 3", "ENLACE" => "index.php"],
];


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relación 3", $barra);
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo()
{

    echo "<h1>Ejercicio 1</h1>";
    $vector = array(); //el vector vacio
    $numero = 0;
    cuentaVeces($vector, "1osición", 7, $numero);
    cuentaVeces($vector, "otra", 2, $numero);

}
