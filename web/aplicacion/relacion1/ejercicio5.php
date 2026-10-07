<?php

use function PHPSTORM_META\elementType;

include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 1", "ENLACE" => "index.php"],
    ["TEXTO" => "ejercicio 5", "ENLACE" => "ejercicio5.php"]
];

//controlador

//relleno el array
$vector = array();
$vector[1] = "esto es una cadena";
$vector["posi1"] = 25.67;
$vector[] = false;
$vector["ultima"] = array(2, 5, 96);
$vector[56] = 23;

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 5", $barra);
cuerpo($vector); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($array)
{

    foreach ($array as $i => $valor) {

        $tipo = gettype($valor);
        echo "Posición ".$i.", contenido (".$tipo."): ";
        $contenido=0;

        //según el tipo del elemento del puntero en el array, cambia la forma en que se muestra en la vista
        switch ($tipo) { 
            case "array":
                $contenido="(";
                foreach ($valor as $subvalor) {
                    $contenido.=$subvalor . ", ";
                }
                $contenido.=")";
                break;
            
            case "integer":
                $contenido = "Entero con valor {$valor}, en binario ".base_convert($valor, 10, 2);
                break;

            case "double":
                $contenido = "Real {$valor}, que al cuadrado es: ".pow($valor, 2);
                break;

            case "string":
                $contenido = "-".$valor."-";
                break;

            case "boolean":
                if($valor)
                    $contenido = "true y su opuesto false";
                else
                    $contenido = "false y su opuesto true";
                break;
        }
        echo $contenido."<br>";
    }
}
