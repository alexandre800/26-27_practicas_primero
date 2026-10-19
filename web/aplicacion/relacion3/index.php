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

    $vector = array();
    $numero = 0;

    echo "Resultado de cuentaVeces(): ".
    (cuentaVeces($vector, "1osición", 7, $numero) ? "se ha ejecutado sin problema" : "ha fallado la función");
    echo ", número de llamadas: ".$numero."<br>";
    
    echo "Resultado de cuentaVeces(): ".
    (cuentaVeces($vector, "otra", 2, $numero) ? "se ha ejecutado sin problema" : "ha fallado la función");
    echo ", número de llamadas: ".$numero."<br>";

    //este falla al poner 2daw como posición asociativa
    echo "Resultado de cuentaVeces(): ".
    (cuentaVeces($vector, "2daw", 6, $numero) ? "se ha ejecutado sin problema" : "ha fallado la función");
    echo ", número de llamadas: ".$numero."<br>";

    //Muestro el array
    echo "<br>Array: <br>";
    foreach($vector as $i=>$valor){
        echo "Posición ".$i.", valor ".$valor."<br>";
    }


    echo "<br><h1>Ejercicio 2</h1>";

    $cadena=generarCadena(7);
    echo "Genero una cadena con 7 caracteres: ".($cadena ? $cadena : "no se puede generar una cadena negativa")."<br>";

    $cadena=generarCadena();
    echo "Genero una cadena con 10 caracteres (por defecto): ".($cadena ? $cadena : "no se puede generar una cadena negativa")."<br>";

    $cadena=generarCadena(-2);
    echo "Genero una cadena con -2 caracteres: ".($cadena ? $cadena : "no se puede generar una cadena negativa")."<br>";

}
