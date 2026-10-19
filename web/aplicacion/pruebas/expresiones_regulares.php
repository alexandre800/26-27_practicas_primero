<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "pruebas", "ENLACE" => "index.php"],
    ["TEXTO" => "expresiones-regulares", "ENLACE" => "expresiones_regulares.php"]
];

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("expresiones regulares", $barra);
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
    
    $cadena="tienes 54 Años 258.34 años";
    $exp="/\d+\.(\d*)/";//1 numero 1 o mas veces, punto, un numero 0 o mas veces (entre parentesis el subpatron)
    // $exp="/años/i/";//no distinguir mayus y minus
    preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);

?>

<?php
}
