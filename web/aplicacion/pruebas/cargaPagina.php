<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "pruebas", "ENLACE" => "index.php"],
    ["TEXTO" => "carga página", "ENLACE" => "cargaPagina.php"]
];

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("carga página", $barra);
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo(){

    $id=15;

?>
    <br><br>
    Elemento de pruebas
    <a href="index.php">inicio</a>

    <h2>Primera forma: enlace</h2>
    <a href="<?= "otrapagina.php?id=$id&nombre=vicente" ?>">Enlace a otra página</a>

    <form method="post" action="otraPagina.php?id=<?= $id ?>">
        <!-- <input type="hidden" name="id" value="<?= $id ?>"> -->

        <select name="id">
            <option value=1>Primero</option>
            <option value=2>Segundo</option>
            <option value=3>Tercero</option>
        </select>

        <label for="nombre">Nombre: 
            <input type="text" name="nombre">
        </label><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php 
    

?>

<?php
}
