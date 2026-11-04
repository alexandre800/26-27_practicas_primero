<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 5", "ENLACE" => "index.php"],
    ["TEXTO" => "Pruebas filtrado", "ENLACE" => "pruebasFiltrado.php"]
];

include_once("val_normal.php");
include_once("val_filter.php");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Pruebas librerías de filtrado", $barra);
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo()
{

    echo "<h2>Validación con var_normal</h2>";

    $variable = 2;
    echo "Valido entero {$variable}: " .
        (\VALNORMAL\validaEntero($variable, 0, 20, 0) ? "número válido" : "número inválido") .
        ", valor actual->" . $variable;

    $variable = -2;
    echo "<br>Valido entero {$variable}: " .
        (\VALNORMAL\validaEntero($variable, 0, 20, 0) ? "número válido" : "número inválido") .
        ", valor actual->" . $variable;

    $variable = 1607.12354;
    echo "<br><br>Valido real {$variable}: " .
        (\VALNORMAL\validaReal($variable, 1000, 150000, 1100) ? "número válido" : "número inválido") .
        ", valor actual->" . $variable;

    $variable = 1823791.32;
    echo "<br>Valido real {$variable}: " .
        (\VALNORMAL\validaReal($variable, 1000, 150000, 1100) ? "número válido" : "número inválido") .
        ", valor actual->" . $variable;

    $variable = "12/3/2024";
    echo "<br><br>Valido fecha {$variable}: " .
        (\VALNORMAL\validaFecha($variable, "01/01/2000") ? "fecha válida" : "fecha inválida") .
        ", valor actual->" . $variable;

    $variable = "2005-12-04";
    echo "<br>Valido fecha {$variable}: " .
        (\VALNORMAL\validaFecha($variable, "01/01/2000") ? "fecha válida" : "fecha inválida") .
        ", valor actual->" . $variable;

    $variable = "0:5:1";
    echo "<br><br>Valido hora {$variable}: " .
        (\VALNORMAL\validaHora($variable, "8:00:00") ? "hora válida" : "hora inválida") .
        ", valor actual->" . $variable;

    $variable = "213:23";
    echo "<br>Valido hora {$variable}: " .
        (\VALNORMAL\validaHora($variable, "8:00:00") ? "hora válida" : "hora inválida") .
        ", valor actual->" . $variable;

    echo "<br><br><h2>Validación con var_filter</h2>";

    $variable = 2;
    echo "Valido entero {$variable}: " .
        (\VALFILTER\validaEntero($variable, 0, 20, 0) ? "número válido" : "número inválido") .
        ", valor actual->" . $variable;

    $variable = -2;
    echo "<br>Valido entero {$variable}: " .
        (\VALFILTER\validaEntero($variable, 0, 20, 0) ? "número válido" : "número inválido") .
        ", valor actual->" . $variable;

}
