<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");

$barra = [
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 5", "ENLACE" => "index.php"]
];

//inicializaciones
$datos = [
    "nombre" => "",
    "passwd" => "",
    "fechaNac" => "",
    "fechaCarnet" => "",
    "horaLev" => "",
    "estado" => 0,
    "estudios" => [],
    "hermanos" => 0,
    "sueldo" => 0
];
$errores = [];

//comprobar si se ha dado a insertar
// if ($_POST) {
if (isset($_POST["cr"])) {

    //nombre
    $nombre = "";
    if (isset($_POST["nombre"])) {
        $nombre = mb_strtoupper($_POST["nombre"]);
    }
    if (validaExpresion($nombre, "/^[^H][A-Z]{0,24}$/", "nombre"))
        $datos["nombre"] = $nombre;
    else
        $errores["nombre"][] = "Error en el nombre";

    //contraseña
    $passwd = "";
    if (isset($_POST["passwd"])) {
        $passwd = ($_POST["passwd"]);
    }
    if (validaExpresion($passwd, "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\$_\-;<>\@])[\S]{8,15}$/", "Contr4se\$a"))
        $datos["passwd"] = $passwd;
    else
        $errores["contraseña"][] = "Error en la contraseña";

    //fecha nacimiento
    $fechaNac = "";
    if (isset($_POST["fechaNac"])) {
        $fechaNac = ($_POST["fechaNac"]);
    }
    if (validaFecha($fechaNac, "01/01/2000"))
        $datos["fechaNac"] = $fechaNac;
    else
        $errores["fecha nacimiento"][] = "Error en la fecha nacimiento";

    //fecha carnet
    $fechaCarnet = "";
    if (isset($_POST["diaCarnet"]) && isset($_POST["mesCarnet"]) && isset($_POST["anioCarnet"])) {
        $fechaCarnet = ($_POST["diaCarnet"] . "/" . $_POST["mesCarnet"] . "/" . $_POST["anioCarnet"]);
    }
    if (validaFecha($fechaCarnet, "01/01/2026")) {

        //comprobar si es mayor edad primero
        if (DateTime::createFromFormat('d/m/Y', $fechaCarnet)->sub(new DateInterval('P18Y')) >=
            DateTime::createFromFormat('d/m/Y', $fechaNac))
            $datos["fechaCarnet"] = $fechaCarnet;
        else
            $errores["fecha carnet"][] = "No es mayor de edad";
    } else
        $errores["fecha carnet"][] = "Error en la fecha carnet";

    //hora levantarse
    $horaLev = "";
    if (isset($_POST["horaLev"])) {
        $horaLev = ($_POST["horaLev"]);
    }
    if (validaHora($horaLev, "08:00:00"))
        $datos["horaLev"] = $horaLev;
    else
        $errores["hora levantarse"][] = "Error en la hora";
    
}


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relación 5", $barra);
cuerpo($datos, $errores); //llamo a la vista
finCuerpo();

// **********************************************************
function cabecera() {}

function cuerpo($datos, $errores)
{
?>
    <a href="pruebasFiltrado.php">Pruebas de las librerías</a>
    <br>
    <br>
    <br>
<?php
    formulario($datos, $errores);
}
function formulario($datos, $errores)
{
    if ($errores) { //mostrar los errores
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div>";
    } else { //si no hay errores, muestro el resumen

    }
?>
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"
            value="<?php echo $datos["nombre"]; ?>"><br>

        <label for="passwd">Contraseña: </label>
        <input type="password" name="passwd" id="passwd"
            value="<?php echo $datos["passwd"]; ?>" size=21><br>

        <label for="fechaNac">Fecha nacimiento: </label>
        <input type="text" name="fechaNac" id="fechaNac"
            value="<?php echo $datos["fechaNac"]; ?>"><br>

        <br><label for="fechaCarnet">Fecha carnet:
            <br><label for="diaCarnet">Día:<input type="number" name="diaCarnet" id="diaCarnet"></label>
            <br><label for="mesCarnet">Mes:<input type="number" name="mesCarnet" id="mesCarnet"></label>
            <br><label for="anioCarnet">Año:<input type="number" name="anioCarnet" id="anioCarnet"></label>
        </label><br><br>

        <label for="horaLev">Hora de levantarse: </label>
        <input type="text" name="horaLev" id="horaLev"
            value="<?php echo $datos["horaLev"]; ?>"><br>

        <br><label for="estado">Estado:<br />
            <input type="radio" name="estado[]" value=1 />
            Estudiante <br />
            <input type="radio" name="estado[]" value=2 />
            En paro<br />
            <input type="radio" name="estado[]" value=3 />
            Trabajando <br />
            <input type="radio" name="estado[]" value=4 />
            Jubilado<br /></label><br>

        <br><label for="estudios">Estudios:<br />
            <input type="checkbox" name="estudios[]" value=0 />
            Sin estudios <br />
            <input type="checkbox" name="estudios[]" value=1 />
            Primaria<br />
            <input type="checkbox" name="estudios[]" value=2 />
            Secundaria <br />
            <input type="checkbox" name="estudios[]" value=3 />
            Bachillerato</label><br />
        <input type="checkbox" name="estudios[]" value=4 />
        Ciclo formativo</label><br />
        <input type="checkbox" name="estudios[]" value=5 />
        Universitarios
        </label><br />

        <br><label for="hermanos">Número de hermanos:
            <input type="number" name="hermanos" id="hermanos">
        </label><br />

        <label for="sueldo">Sueldo: </label>
        <input type="number" name="sueldo" id="sueldo"
            value="<?php echo $datos["sueldo"]; ?>"><br>

        <input type="submit" class="boton" value="Validar" name="cr">

    </form>
<?php
}
