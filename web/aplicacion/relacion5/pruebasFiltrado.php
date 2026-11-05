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

    $variable = "0:5:15";
    echo "<br><br>Valido hora {$variable}: " .
        (\VALNORMAL\validaHora($variable, "8:00:00") ? "hora válida" : "hora inválida") .
        ", valor actual->" . $variable;

    $variable = "213:23";
    echo "<br>Valido hora {$variable}: " .
        (\VALNORMAL\validaHora($variable, "8:00:00") ? "hora válida" : "hora inválida") .
        ", valor actual->" . $variable;

    $variable = "paco@gmail.com";
    echo "<br><br>Valido email {$variable}: " .
        (\VALNORMAL\validaEmail($variable, "user@example.com") ? "email válido" : "email inválido") .
        ", valor actual->" . $variable;

    $variable = "paco123@g.educaand.es";
    echo "<br>Valido email {$variable}: " .
        (\VALNORMAL\validaEmail($variable, "user@example.com") ? "email válido" : "email inválido") .
        ", valor actual->" . $variable;

    $variable = "@fe233.324.dsfaf";
    echo "<br>Valido email {$variable}: " .
        (\VALNORMAL\validaEmail($variable, "user@example.com") ? "email válido" : "email inválido") .
        ", valor actual->" . $variable;

    $variable = "                        fdsfvs";
    echo "<br><br>Valido cadena {$variable}: " .
        (\VALNORMAL\validaCadena($variable, 15, "por defecto") ? "cadena válida" : "cadena inválida") .
        ", valor actual->" . $variable;

    $variable = "vdsvdvsdvffggbsdfb";
    echo "<br>Valido cadena {$variable}: " .
        (\VALNORMAL\validaCadena($variable, 15, "por defecto") ? "cadena válida" : "cadena inválida") .
        ", valor actual->" . $variable;

    $variable = "Paco";
    echo "<br><br>Valido expresión {$variable}: " .
        (\VALNORMAL\validaExpresion($variable, "/^[^H]/", "por defecto") ? "expresión válida" : "expresión inválida") .
        ", valor actual->" . $variable;

    $variable = "Héctor";
    echo "<br>Valido expresión {$variable}: " .
        (\VALNORMAL\validaExpresion($variable, "/^[^H]/", "por defecto") ? "expresión válida" : "expresión inválida") .
        ", valor actual->" . $variable;

    $variable = "Paco";
    $array = ["alumno1"=>"Pedro", "alumno2"=>"Paco", "alumno3"=>"María"];
    echo "<br><br>Está {$variable} en el array: " .
        (\VALNORMAL\validaRango($variable, $array, 1) ? "si" : "no");

    $variable = "Héctor";
    echo "<br>Está {$variable} en el array: " .
        (\VALNORMAL\validaRango($variable, $array) ? "si" : "no");//tercer parámetro=1 por defecto

    $variable = "alumno3";
    echo "<br><br>Está el alumno con clave {$variable} en el array: " .
        (\VALNORMAL\validaRango($variable, $array, 2) ? "si" : "no");

    $variable = "alumno4";
    echo "<br>Está el alumno con clave {$variable} en el array: " .
        (\VALNORMAL\validaRango($variable, $array, 2) ? "si" : "no");



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

function mostrarValidacion($variable){

}