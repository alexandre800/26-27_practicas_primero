<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 2", "ENLACE" => "index.php"],
    ["TEXTO" => "ejercicio 5", "ENLACE" => "ejercicio5.php"]
];

//controlador
$cadena = <<<'fin'
<h1>h1</h1><h2>h2</h2>
1234, 2.456, 1892369218<br />
pedro123@gmail.com, pablo35@hotmail.com
fin;

// Expresiones regulares
$regexEtiqueta = '/<[^>]+>/';
$regexNumero = '/\d+/';
$regexEmail = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}/';

$etiqueta = "No encontrado";
$numero = "No encontrado";
$email = "No encontrado";

// Buscar primera etiqueta HTML
if (preg_match($regexEtiqueta, $cadena, $coincidencia, PREG_OFFSET_CAPTURE)) {
    $etiqueta = "Etiqueta encontrada: " . htmlspecialchars($coincidencia[0][0]) .
        " en la posición " . $coincidencia[0][1] . "<br>";
}

// Buscar primer número
if (preg_match($regexNumero, $cadena, $coincidencia, PREG_OFFSET_CAPTURE)) {
    $numero = "Número encontrado: " . $coincidencia[0][0] .
        " en la posición " . $coincidencia[0][1] . "<br>";
}

// Buscar primer email
if (preg_match($regexEmail, $cadena, $coincidencia, PREG_OFFSET_CAPTURE)) {
    $email = "Email encontrado: " . $coincidencia[0][0] .
        " en la posición " . $coincidencia[0][1] . "<br>";
}

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 5", $barra);
cuerpo($cadena, $etiqueta, $numero, $email); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($cadena, $etiqueta, $numero, $email)
{

    echo $cadena . "<br>";
    echo "<br><br>".$etiqueta . "<br>";
    echo $numero . "<br>";
    echo $email . "<br>";
}
