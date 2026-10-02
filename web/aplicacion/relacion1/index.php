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

        <h1>Relación 1</h1>
        <a href="ejercicio1.php">Ejercicio 1</a>

    <?php

}

