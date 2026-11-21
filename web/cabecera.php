<?php
define("RUTABASE", dirname(__FILE__));
//define("MODO_TRABAJO","produccion"); //en "produccion o en desarrollo
define("MODO_TRABAJO", "desarrollo"); //en "produccion o en desarrollo

if (MODO_TRABAJO == "produccion")
    error_reporting(0);
else
    error_reporting(E_ALL);

spl_autoload_register(function ($clase) {
    $ruta = RUTABASE . "/scripts/clases/";
    $fichero = $ruta . "$clase.php";

    if (file_exists($fichero)) {
        require_once($fichero);
    } else {
        throw new Exception("La clase $clase no se ha encontrado.");
    }
});

include(RUTABASE . "/aplicacion/plantilla/plantilla.php");

//creo todos los objetos que necesita mi aplicación

//-------para la relacion 7
//obtener ip y navegador
$ip = str_replace(".", "_", $_SERVER["REMOTE_ADDR"]);

$navegador = "";
$ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
if (str_contains($ua, "edg"))
    $navegador = "edge";
elseif (str_contains($ua, "chrome"))
    $navegador = "chrome";
elseif (str_contains($ua, "firefox"))
    $navegador = "firefox";
else
    $navegador = "otro";

//obtener nombre imagen
$nombreImagen = "../../imagenes/puntos/{$ip}_{$navegador}.jpeg";

//obtener fichero con los puntos
$ficheroPuntos = "../../ficheros/puntos_{$ip}_{$navegador}.dat";
$arrayPuntos = [];