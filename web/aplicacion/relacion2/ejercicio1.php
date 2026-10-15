<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 2", "ENLACE" => "index.php"],
    ["TEXTO" => "ejercicio 1", "ENLACE" => "ejercicio1.php"]
];

//controlador

$despedida="Adiós";

//cadena con heredock
//se declara como marcador de texto el grupo de caracteres (marca el final de la cadena)
$texto=<<<fin
Hola, <br />
estoy escribiendo una cadena con heredock ‘, “, á, é, ñ <br />
$despedida<br />
fin;

//cadena con newdock
$texto2=<<<'fin'
Hola <br />
estoy escribiendo una cadena con newdock ‘, “, á, é, ñ <br />
$despedida<br />
fin;

$texto3='
Hola <br />
estoy escribiendo una cadena con comillas simples ‘, “, á, é, ñ <br />
$despedida<br />';

$texto4="
Hola <br />
estoy escribiendo una cadena con comillas dobles ‘, “, á, é, ñ <br />
$despedida<br />";

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1", $barra);
cuerpo($texto, $texto2, $texto3, $texto4); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($texto, $texto2, $texto3, $texto4)
{

    echo $texto."<br>";
    echo $texto2."<br>";
    echo $texto3."<br>";
    echo $texto4."<br>";

    //para que aparezcan las etiquetas html de forma literal:
    echo htmlspecialchars($texto4);

}
