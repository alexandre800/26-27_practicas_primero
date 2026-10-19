<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include_once("./mis_funciones.php");//se incluye, y si se ha incluido ya, no se vuelve a incluirs

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "pruebas", "ENLACE" => "index.php"],
    ["TEXTO" => "funciones", "ENLACE" => "index_funciones.php"]
];

//controlador
$numero=doble(10);
//comprobacion
// if($numero===false){
//     //hay un error, lo resuelve
//     $numero=10;
// }

if(!$numero=doble($numero))
    exit;

//datos basicos

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("funciones", $barra);
cuerpo($numero); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($numero){
?>
    <br><br>
    Elemento de pruebas
    <a href="index.php">inicio</a>

    <?php 
    
    echo "el doble del número es ".$numero;       

?>

<?php
}
