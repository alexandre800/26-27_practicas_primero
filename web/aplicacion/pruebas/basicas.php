<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("prubas básicas");
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo(){
?>
    <br><br>
    Elemento de pruebas
    <a href="index.php">inicio</a>

    <?php 
    
        echo "cadena";

    ?>

<?php
}
