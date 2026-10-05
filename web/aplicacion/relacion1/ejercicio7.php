<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 7");
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo()
{

    //fecha actual
    echo "Fecha actual (d/m/Y): " . date("d/m/Y") . "<br>";
    echo "Fecha actual (dia, mes, año, dia de la semana): " . date("j, F Y, l") . "<br>";
    echo "Hora actual: ".date("H:i:s") . "<br>";

    //fecha 29/3/2024 a 12:45


    //fecha actual menos 12 días y 4 horas 

}
