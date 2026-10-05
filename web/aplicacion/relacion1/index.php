<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador

//datos basicos


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relación 1");
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo(){

    ?>

        <!-- <h1>Relación 1</h1> -->
        <a href="ejercicio1.php">Ejercicio 1</a>
        <a href="ejercicio2.php">Ejercicio 2</a>
        <a href="ejercicio3.php">Ejercicio 3</a>
        <a href="ejercicio4.php">Ejercicio 4</a>
        <a href="ejercicio5.php">Ejercicio 5</a>
        <a href="ejercicio6.php">Ejercicio 6</a>
        <a href="ejercicio7.php">Ejercicio 7</a>
    <?php

}

