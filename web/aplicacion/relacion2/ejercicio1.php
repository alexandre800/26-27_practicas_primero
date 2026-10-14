<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 2", "ENLACE" => "index.php"],
    ["TEXTO" => "ejercicio 1", "ENLACE" => "ejercicio1.php"]
];
//controlador

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1", $barra);
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo()
{

    

}
