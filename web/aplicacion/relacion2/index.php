<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador
$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 2", "ENLACE" => "index.php"]
];


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relación 2", $barra);
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo(){

    ?>

        <a href="ejercicio1.php">Ejercicio 1</a><br>
        <a href="ejercicio2.php">Ejercicio 2</a><br>
        <a href="ejercicio3.php">Ejercicio 3</a><br>
        <a href="ejercicio4.php">Ejercicio 4</a><br>
        <a href="ejercicio5.php">Ejercicio 5</a><br>
    <?php

}

