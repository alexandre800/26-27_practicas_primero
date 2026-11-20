<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador

$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "/index.php"
    ],
    [
        "TEXTO" => "pruebas",
        "ENLACE" => "index.php"
    ],
    [
        "TEXTO" => "prueba imagen",
        "ENLACE" => "pruebaImagen.php"
    ],
];

$nombreFichero=RUTABASE."/imagenes/pruebaimagen.jpeg";
$crear=true;

if($crear){
    $imagen = imagecreatetruecolor(250,250);

    //genero el color azul
    $color=imagecolorallocate($imagen, 0, 0, 255);
    //rellena un rectángulo
    imagefilledrectangle($imagen, 10, 10, 190, 190, $color);

    //dibujo una línea azul
    $color=imagecolorallocate($imagen, 255, 255, 255);
    imageline($imagen, 10, 10, 100, 15, $color);

    imagejpeg($imagen, $nombreFichero);
}

if(isset($_GET["descargar"])){
    $imagen=imagecreatefromjpeg($nombreFichero);
    $color=imagecolorallocate($imagen, 255, 255, 0);
    imagechar($imagen, 2, 10, 150, "marca agua", $color);
    header('Content-Disposition:attachment;filename="imagen.jpeg"');
    imagejpeg($imagen);
}

//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("Prueba de ficheros", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera()
{
?>
    <!-- esto va en el head -->
<?php



}

//vista
function cuerpo()
{
    
?>
    <img src="/imagenes/pruebaImagen.jpeg" alt="imagen">
    <a href="#" name="descargar">Descargar</a>
<?php

}
