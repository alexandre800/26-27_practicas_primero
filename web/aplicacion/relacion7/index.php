<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");

$barra = [
    ["TEXTO" => "Inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 7", "ENLACE" => "index.php"]
];

//obtener ip y navegador
$ip = str_replace(".", "_", $_SERVER["REMOTE_ADDR"]);
$navegador = obtenerNavegador();
//obtener nombre imagen
$nombreImagenFisica = "../../imagenes/puntos/{$ip}_{$navegador}.jpg";
$nombreImagenWeb = "../../imagenes/puntos/{$ip}_{$navegador}.jpg";

//obtener fichero con los puntos
$ficheroPuntos = "../../ficheros/puntos_{$ip}_{$navegador}.dat";
//cargar puntos del fichero
$arrayPuntos = [];
if (!file_exists($ficheroPuntos)) {
    touch($ficheroPuntos);
}

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

//crear imagen si no existe
if (!file_exists($nombreImagenFisica)) {
    generarImagen($arrayPuntos, $nombreImagenFisica);
}

$punto = new Punto(0, 0, "black", 1);
$errores = [];

//validaciones
if (isset($_POST["cr"])) {

    $x = $_POST["x"] ?? 0;
    if (validaEntero($x, 0, 500, 0))
        $punto->setX($x);
    else
        $errores["X"][] = "Debe ser un entero entre 0 y 500";

    $y = $_POST["y"] ?? 0;
    if (validaEntero($y, 0, 500, 0))
        $punto->setY($y);
    else
        $errores["Y"][] = "Debe ser un entero entre 0 y 500";

    $color = $_POST["color"] ?? "";
    if (!$punto->setColor($color))
        $errores["color"][] = "Debe elegir un color";

    $grosor = $_POST["grosor"] ?? "";
    if (!$punto->setGrosor($grosor))
        $errores["grosor"][] = "Debe elegir un grosor";

    //si no hay errores, se guarda el punto en el array
    //y en el fichero, y se genera la imagen
    if (empty($errores)) {

        $arrayPuntos[] = $punto;

        guardarPuntos($arrayPuntos, $ficheroPuntos);

        generarImagen($arrayPuntos, $nombreImagenFisica);
    }
}

if(isset($_POST["borrar"])){

    $puntoBorrar = $_POST["borrarSelect"] ?? 0;
    array_splice($arrayPuntos, $puntoBorrar);

}

//vista
inicioCabecera("RELACION 7");
cabecera();
finCabecera();
inicioCuerpo("Relación 7", $barra);
cuerpo($arrayPuntos, $errores, $nombreImagenWeb);
finCuerpo();

function cabecera() {}

function cuerpo(array $arrayPuntos, array $errores, string $nombreImagen)
{
    formulario($arrayPuntos, $errores, $nombreImagen);
}

function formulario(array $arrayPuntos, array $errores, string $nombreImagen)
{
?>

    <form action="" method="post">

        X:<input type="number" name="x" value="<?= $_POST["x"] ?? 0 ?>">
        <?php
        if (isset($errores["X"])) {
            echo "<span style='color:red'>{$errores["X"][0]}</span>";
        }
        ?><br><br>

        Y:<input type="number" name="y" value="<?= $_POST["y"] ?? 0 ?>">
        <?php
        if (isset($errores["Y"])) {
            echo "<span style='color:red'>{$errores["Y"][0]}</span>";
        }
        ?><br><br>

        Color:
        <select name="color">
            <option value="">Seleccione color</option>
            <option value="black">Negro</option>
            <option value="red">Rojo</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
        </select>
        <?php
        if (isset($errores["color"])) {
            echo "<span style='color:red'>{$errores["color"][0]}</span>";
        }
        ?><br><br>

        Grosor:
        <input type="radio" name="grosor" value="1"> Fino
        <input type="radio" name="grosor" value="2"> Medio
        <input type="radio" name="grosor" value="3"> Gordo
        <?php
        if (isset($errores["grosor"])) {
            echo "<span style='color:red'>{$errores["grosor"][0]}</span>";
        }
        ?><br><br>

        <input type="submit" name="cr" value="Crear punto">

    </form>
    <br>
    <form action="" method="post">
        <select name="borrarSelect">
            <?php
            foreach($arrayPuntos as $clave=>$punto){
                echo "<option value='{$clave}'>".($clave+1)."-> X: " . $punto->getX() . "; " .
                "Y: " . $punto->getY() . "; " .
                "Color: " . $punto->getColor() . "; " .
                "Grosor: " . $punto->getGrosor()."</option>";
            }
            ?>
        </select>
        <input type="submit" name="borrar" value="Borrar punto">
    </form>

    <br>

    <textarea rows="10" cols="60" readonly><?php
        foreach ($arrayPuntos as $punto) {

            echo "Coordenada X: " . $punto->getX() . "; " .
                "Coordenada Y: " . $punto->getY() . "; " .
                "Color: " . $punto->getColor() . "; " .
                "Grosor: " . $punto->getGrosor() .
                "\n";
        }
        ?>
    </textarea><br><br>

    <img src="<?= $nombreImagen ?>" alt="Puntos">

<?php
}

function guardarPuntos(array $arrayPuntos, string $fichero): void {

    $contenido = "";

    foreach ($arrayPuntos as $punto) {

        $contenido .= $punto->getX() . ";" . $punto->getY() . ";" .
            $punto->getColor() . ";" .$punto->getGrosor() .PHP_EOL;
    }

    file_put_contents($fichero, $contenido);
}


function generarImagen(array $arrayPuntos, string $nombreImagen): void {

    $img = imagecreatetruecolor(500, 500);

    $blanco = imagecolorallocate($img, 255, 255, 255);
    $negro = imagecolorallocate($img, 0, 0, 0);

    imagefill($img, 0, 0, $blanco);
    imagerectangle($img, 0, 0, 499, 499, $negro);

    foreach ($arrayPuntos as $punto) {

        $rgb =Punto::COLORES[$punto->getColor()]["rgb"];

        $color = imagecolorallocate($img, $rgb[0], $rgb[1], $rgb[2]);

        $tam = $punto->getGrosor() * 6;

        imagefilledellipse($img, $punto->getX(), $punto->getY(), $tam, $tam, $color);
    }

    imagejpeg($img, $nombreImagen);
}

function obtenerNavegador(): string
{
    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);

    if (str_contains($ua, "edg"))
        return "edge";

    if (str_contains($ua, "chrome"))
        return "chrome";

    if (str_contains($ua, "firefox"))
        return "firefox";

    return "otro";
}
