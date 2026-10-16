<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 2", "ENLACE" => "index.php"],
    ["TEXTO" => "ejercicio 4", "ENLACE" => "ejercicio4.php"]
];

//controlador
$num1 = 17.5;
$num2 = 379987.24;

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4", $barra);
cuerpo($num1, $num2); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($num1, $num2)
{
    //number_format(numero a formatear, numero de decimales, separador decimal, separador de miles)
    //mb_str_pad(cadena a la que poner la longitud, longitud, caracter/es de relleno, hacia donde se rellena la cadena)
    // la etiqueta <pre> muestra el texto exactamente como está escrito
    echo "El primer valor -" . mb_str_pad(number_format($num1, 1, ",", "."), 15, '0', STR_PAD_LEFT).
        "-, el segundo valor -<pre>" . mb_str_pad(number_format($num2, 2, ",", "."), 15, " ", STR_PAD_LEFT) . "</pre>-";
}
