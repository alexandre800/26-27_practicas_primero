<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador

//datos basicos
$nombre="Vicente";
$edad=30;

$basicos=[
    "nombre"=>$nombre,
    "edad"=>$edad
];

//relleno otras
$otras = rellenarOtras();

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("paso parametros");
cuerpo($basicos, $otras); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($bas, $ot){
?>
    <br><br>
    Elemento de pruebas
    <a href="index.php">inicio</a>

    <?php 
    
    echo "Mi nombre es {$bas["nombre"]} de {$bas["edad"]} años".PHP_EOL;
    echo "Con otros datos {$ot}";    

?>

<?php
}

function rellenarOtras(){
    return "de 2 DAW";
}