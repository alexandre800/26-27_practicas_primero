<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "pruebas", "ENLACE" => "index.php"],
    ["TEXTO" => "cadenas", "ENLACE" => "cadenas.php"]
];

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("cadenas", $barra);
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

    <!--entidades html para solucionar problemas codificacion (ya no se hace)-->
    El ni&ntilde;o me ha escrito una carta.
    Qu&eacute; bonita

    <?php 
    

?>

<?php
}
