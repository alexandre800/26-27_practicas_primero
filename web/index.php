<?php
include_once(dirname(__FILE__) . "/cabecera.php");

//controlador
$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "/index.php"]
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION INDEX", $barra);
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {
    
}

//vista
function cuerpo(){
?>
    <br><br>
    <a href="./aplicacion/pruebas/index.php">Acceso a pruebas</a>
    <a href="./aplicacion/pruebas/pasopar.php">paso parametros</a>
    <a href="./aplicacion/pruebas/array.php">prueba arrays</a>
<?php
}
