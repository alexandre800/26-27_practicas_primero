<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "pruebas", "ENLACE" => "index.php"],
    ["TEXTO" => "carga página", "ENLACE" => "cargaPagina.php"],
    ["TEXTO" => "otra pagina", "ENLACE" => "otraPagina.php"]
];

//controlador
$datos=[
    "id"=>0,
    "nombre"=>""
];

$id=0;
if(isset($_REQUEST["id"])){//compruebo que el id es correcto
    $id=intval($_REQUEST["id"]);
}
$datos["id"]=$id;

$nombre="";
if(isset($_REQUEST["nombre"])){//compruebo que el nombre es correcto
    $nombre=mb_trim($_REQUEST["nombre"]);
}
$datos["nombre"]=$nombre;


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("otra página", $barra);
cuerpo($datos); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($datos){

    echo "se ha recibido un id {$datos["id"]} y nombre {$datos["nombre"]}";


}
