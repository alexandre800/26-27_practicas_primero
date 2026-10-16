<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 2", "ENLACE" => "index.php"],
    ["TEXTO" => "ejercicio 3", "ENLACE" => "ejercicio3.php"]
];

//controlador

//caracteres válidos (números , y letras mayúsculas y minúsculas)
const CARACTERES = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
$array = mb_str_split(CARACTERES);//pasar la cadena a un array (una posicion=un caracter)

$cadena="";
while(mb_strlen($cadena)<20) {//cadena de 20 caracteres
    //coge el caracter de una posición aleatoria del array
    $cadena .= $array[mt_rand(0, mb_strlen(CARACTERES)-1)];
}

$cadena2="";
while(mb_strlen($cadena2)<20) {
    $ascii = mt_rand(48, 122);
    if (
        ($ascii >= 48 && $ascii <= 57) ||//rango de numeros
        ($ascii >= 65 && $ascii <= 90) ||//rango de mayúsculas
        ($ascii >= 97 && $ascii <= 122)//rango de minúsculas
    ) {
        $cadena2 .= chr($ascii);//genera el caracter correspondiente al número en ascii
    }
}

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3", $barra);
cuerpo($cadena, $cadena2); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($cadena, $cadena2)
{

    echo "Cadena aleatoria creada a partir de un array: ".$cadena;
    echo "<br><br>Cadena aleatoria creada a código ASCII: ".$cadena2;

}
