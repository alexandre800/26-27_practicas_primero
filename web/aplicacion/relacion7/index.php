<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");

$barra = [
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 7", "ENLACE" => "index.php"]
];

//inicializaciones
$punto = new Punto(0, 0, "black", 1);
$errores = [];

//comprobar si se ha dado al botón validar
if (isset($_POST["cr"])) {

    //--------Validación de campos

    //punto x
    $x = 0;
    if (isset($_POST["x"]))
        $x = $_POST["x"];

    if (validaEntero($x, 0, 500, 0))
        $punto->setX($x);
    else
        $errores["X"][] = "Debe ser un número entero entre 0 y 500";

    //punto y
    $y = 0;
    if (isset($_POST["y"]))
        $y = $_POST["y"];

    if (validaEntero($y, 0, 500, 0))
        $punto->setY($y);
    else
        $errores["Y"][] = "Debe ser un número entero entre 0 y 500";

    //color
    $color = "";
    if (isset($_POST["color"]))
        $color = $_POST["color"];

    if(!$punto->setColor($color))
        $errores["color"][] = "Se debe elegir un color";

    //grosor
    $grosor = 0;
    if (isset($_POST["grosor"]))
        $grosor = $_POST["grosor"];

    if (!$punto->setGrosor($grosor))
        $errores["grosor"][] = "Se debe elegir un grosor";

    if (empty($errores))
        $arrayPuntos[] = $punto;
}

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relación 5", $barra);
cuerpo($arrayPuntos, $errores); //llamo a la vista
finCuerpo();

// **********************************************************
function cabecera() {}

function cuerpo(array $arrayPuntos, array $errores)
{
    formulario($arrayPuntos, $errores);
}

function formulario(array $arrayPuntos, array $errores)
{
?>

    <form action="" method="post">
        X: <input type="number" name="x" value="0">
        <?php
        if (isset($errores["X"])) {
            echo "<span style='color: red'>{$errores["X"][0]}</span>";
        }
        ?><br>
        Y: <input type="number" name="y" value="0">
        <?php
        if (isset($errores["Y"])) {
            echo "<span style='color: red'>{$errores["Y"][0]}</span>";
        }
        ?><br><br>

        Color: <select name="color">
            <option value="0">-Seleccione color-</option>
            <option value="black">Negro</option>
            <option value="red">Rojo</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
        </select>
        <?php
        if (isset($errores["color"])) {
            echo "<span style='color: red'>{$errores["color"][0]}</span>";
        }
        ?><br><br>

        Grosor:<br><input type="radio" name="grosor" value=1>Fino
        <input type="radio" name="grosor" value=2>Medio
        <input type="radio" name="grosor" value=3>Gordo
        <?php
        if (isset($errores["grosor"])) {
            echo "<span style='color: red'>{$errores["grosor"][0]}</span>";
        }
        ?><br><br>

        <input type="submit" name="cr" value="Crear punto">
    </form>

    <textarea cols="40">
        <?php 
        if(!empty($arrayPuntos)){
            foreach($arrayPuntos as $punto){
                echo "X: ".$punto->getX().", Y: ".$punto->getY().
                ", color: ".$punto->getColor().", grosor: ".$punto->getGrosor();
            }
        }
        ?>
    </textarea>
    <img src="" alt="">

<?php
}
