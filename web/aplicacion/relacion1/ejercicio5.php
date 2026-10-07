<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "relación 1", "ENLACE" => "index.php"]
];

//controlador
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

            case "float":
                $contenido = "Real {$valor}, que al cuadrado es: ".pow($valor, 2);
                break;

            case "string":
                $contenido = "-".$valor."-";
                break;

            case "boolean":
                $contenido = "{$valor} y su opuesto ".!$valor;
                break;
        }
        echo "<br>";
    }
}
