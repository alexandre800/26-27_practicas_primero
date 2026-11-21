<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

// if(isset($_POST["descargar"])){
//     $imagen=imagecreatefromjpeg($nombreImagen);
//     header('Content-Disposition:attachment;filename="imagenPuntos.jpeg"');
//     imagejpeg($imagen);
// }

if (isset($_POST["descargar"])) {

    header("Content-Type: image/jpeg");
    header("Content-Disposition: attachment; filename=imagenPuntos.jpeg");

    $img = imagecreatetruecolor(500, 500);

    $blanco = imagecolorallocate($img, 255, 255, 255);
    $negro = imagecolorallocate($img, 0, 0, 0);

    imagefill($img, 0, 0, $blanco);
    imagerectangle($img, 0, 0, 499, 499, $negro);

    $lineas = file($ficheroPuntos, FILE_IGNORE_NEW_LINES);
    foreach ($lineas as $linea) {

        $datos = explode(";", $linea);

        if (count($datos) == 4) {

            $arrayPuntos[] = new Punto(
                (int)trim($datos[0]),
                (int)trim($datos[1]),
                trim($datos[2]),
                (int)trim($datos[3])
            );
        }
    }

    foreach ($arrayPuntos as $punto) {

        $rgb = Punto::COLORES[$punto->getColor()]["rgb"];

        $color = imagecolorallocate($img, $rgb[0], $rgb[1], $rgb[2]);

        $tam = $punto->getGrosor() * 6;

        imagefilledellipse($img, $punto->getX(), $punto->getY(), $tam, $tam, $color);
    }

    imagejpeg($img);
}
