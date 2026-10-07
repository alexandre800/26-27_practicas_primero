<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 1", "ENLACE" => "index.php"],
    ["TEXTO" => "ejercicio 7", "ENLACE" => "ejercicio7.php"]
];
//controlador

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 7", $barra);
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo()
{

    date_default_timezone_set('Europe/Madrid');//pongo la zona horaria española

    //fecha actual
    echo "Fecha actual (d/m/Y): " . date("d/m/Y") . "<br>";
    echo "Fecha actual (dia, mes, año, dia de la semana): " . date("j, F Y, l") . "<br>";
    echo "Hora actual: ".date("H:i:s") . "<br><br>";

    //fecha 29/3/2024 a 12:45
    $fecha2 = new DateTime("23-03-2024 12:45:00");
    echo "Fecha 2024 (d/m/Y): " . $fecha2->format("d/m/Y"). "<br>";
    echo "Fecha 2024 (dia, mes, año, dia de la semana): " . $fecha2->format("j, F Y, l") . "<br>";
    echo "Hora 2024: ".$fecha2->format("H:i:s") . "<br><br>";

    //fecha actual menos 12 días y 4 horas
    $fecha3 = time();
    $fecha3-=60*60*24*12; //resto a la fecha 12 dias (la operación calcula 12 días en segundos)
    $fecha3-=60*60*4; //resto a la fecha 4 horas
    echo "Fecha actual-12d, 4 horas (d/m/Y): " . date('d/m/Y', $fecha3). "<br>";
    echo "Fecha actual-12d, 4 horas (dia, mes, año, dia de la semana): " . date("j, F Y, l", $fecha3) . "<br>";
    echo "Hora actual-12d, 4 horas: ".date("H:i:s", $fecha3) . "<br>";

}
