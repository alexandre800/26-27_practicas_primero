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

//comprobar si se ha dado al botón validar
if (isset($_POST["cr"])) {

    //--------Validación de campos
    //nombre
    $nombre = "";
    if (isset($_POST["nombre"])) {
        $nombre = mb_strtoupper($_POST["nombre"]);
    }
    if (validaExpresion($nombre, "/^[^H][A-Z]{0,24}$/", "nombre"))
        $datos["nombre"] = $nombre;//si es válido se añade al array de datos
    else //si no es válido se añade un error al array de errores
        $errores["nombre"][] = "No debe empezar por h (máximo 24 caracteres)";

    //contraseña
    $passwd = "";
    if (isset($_POST["passwd"])) {
        $passwd = ($_POST["passwd"]);
    }
    if (validaExpresion($passwd, "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\$_\-;<>\@])[\S]{8,15}$/", "Contr4se\$a"))
        $datos["passwd"] = $passwd;
    else
        $errores["contraseña"][] = "Debe contener minúsculas, mayúsculas, caracteres especiales y números (8-15 caracteres)";

    //fecha nacimiento
    $fechaNac = "";
    if (isset($_POST["fechaNac"])) {
        $fechaNac = ($_POST["fechaNac"]);
    }
    if (validaFecha($fechaNac, "01/01/2000"))
        $datos["fechaNac"] = $fechaNac;
    else
        $errores["fecha nacimiento"][] = "Introduzca fecha formato (dd/mm/aaaa)";

    //fecha carnet
    $fechaCarnet = "";
    if (isset($_POST["diaCarnet"]) && isset($_POST["mesCarnet"]) && isset($_POST["anioCarnet"])) {
        $fechaCarnet = ($_POST["diaCarnet"] . "/" . $_POST["mesCarnet"] . "/" . $_POST["anioCarnet"]);
    }
    if (validaFecha($fechaCarnet, "01/01/2026")) {

        //comprobar si fecha de nacimiento +18 años es menor que fecha carnet
        if (
            DateTime::createFromFormat('d/m/Y', $fechaCarnet)->sub(new DateInterval('P18Y')) >=
            DateTime::createFromFormat('d/m/Y', $fechaNac)
        )
            $datos["fechaCarnet"] = $fechaCarnet;
        else
            $errores["fecha carnet"][] = "No es mayor de edad";
    } else
        $errores["fecha carnet"][] = "Introduzca fecha formato (dd/mm/aaaa)";

    //hora levantarse
    $horaLev = "";
    if (isset($_POST["horaLev"])) {
        $horaLev = ($_POST["horaLev"]);
    }
    if (validaHora($horaLev, "08:00:00"))
        $datos["horaLev"] = $horaLev;
    else
        $errores["hora levantarse"][] = "Introduzca hora formato (hh:mm:ss)";

    //estado
    $estado = 0;
    if (isset($_POST["estado"])) {
        $estado = ($_POST["estado"]);
    }
    if ($estado != 0)
        $datos["estado"] = $estado;
    else
        $errores["estado"][] = "Seleccione su estado actual";


    //estudios
    $estudios = [];
    if (isset($_POST["estudios"])) {
        $estudios = ($_POST["estudios"]);
    }
    if (validaRango("6", $estudios, 1))
        $errores["estudios"][] = "Opción inválida";
    else if (count($estudios) > 1 && validaRango("0", $estudios, 1))
        $errores["estudios"][] = "Si no tiene estudios, marque solo esa opción";
    else if (!$estudios)
        $errores["estudios"][] = "Indique sus estudios";
    else
        $datos["estudios"] = $estudios;

    //hermanos
    $hermanos = 0;
    if (isset($_POST["hermanos"])) {
        $hermanos = intval($_POST["hermanos"]);
    }
    if (validaEntero($hermanos, 0, 20, 0))
        $datos["hermanos"] = $hermanos;
    else
        $errores["hermanos"][] = "Introduzca un número entero entre 0 y 20";

    //sueldo
    $sueldo = 0;
    if (isset($_POST["sueldo"])) {
        $sueldo = floatval($_POST["sueldo"]);
    }
    if (validaReal($sueldo, 1000, 150000, 1100))
        $datos["sueldo"] = $sueldo;
    else
        $errores["sueldo"][] = "Introduzca un número entre 1000 y 150000";
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

    //solo se muestra el resumen si se ha pulsado en validar y no hay errores
    if (isset($_POST["cr"]) && empty($errores)) {

        echo "<h2>Datos introducidos correctamente</h2>";

        echo "Nombre: {$datos['nombre']}<br>";
        echo "Contraseña: {$datos['passwd']}<br>";
        echo "Fecha nacimiento: {$datos['fechaNac']}<br>";
        echo "Fecha carnet: {$datos['fechaCarnet']}<br>";
        echo "Hora levantarse: {$datos['horaLev']}<br>";

        switch ($datos["estado"]) {
            case 1:
                echo "Estado: estudiante";
                break;
            case 2:
                echo "Estado: en paro";
                break;
            case 3:
                echo "Estado: trabajando";
                break;
            case 4:
                echo "Estado: jubilado";
                break;
        }

        $cad = "<br>Estudios: ";
        foreach ($datos["estudios"] as $estudio) {
            switch ($estudio) {
                case 0:
                    $cad .= "sin estudios";
                    break;
                case 1:
                    $cad .= "primaria ";
                    break;
                case 2:
                    $cad .= "secundaria ";
                    break;
                case 3:
                    $cad .= "bachillerato ";
                    break;
                case 4:
                    $cad .= "ciclo formativo ";
                    break;
                case 5:
                    $cad .= "universitarios ";
                    break;
            }
        }
        echo $cad."<br>";

        echo "Hermanos: {$datos['hermanos']}<br>";
        echo "Sueldo: {$datos['sueldo']}<br>";
    } else //si no, se muestra el formulario
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
            <input type="radio" name="estado" value=1 />
            Estudiante <br />
            <input type="radio" name="estado" value=2 />
            En paro<br />
            <input type="radio" name="estado" value=3 />
            Trabajando <br />
            <input type="radio" name="estado" value=4 />
            Jubilado<br /></label><br>

        <br><label for="estudios">Estudios:<br />
            <input type="checkbox" name="estudios[]" value=0 />
            Sin estudios <br />
            <input type="checkbox" name="estudios[]" value=1 />
            Primaria<br />
            <input type="checkbox" name="estudios[]" value=2 />
            Secundaria <br />
            <input type="checkbox" name="estudios[]" value=3 />
            Bachillerato<br />
            <input type="checkbox" name="estudios[]" value=4 />
            Ciclo formativo<br />
            <input type="checkbox" name="estudios[]" value=5 />
            Universitarios<br />
            <input type="checkbox" name="estudios[]" value=6 />
            Opción inválida
        </label><br />

        <br><label for="hermanos">Número de hermanos:
            <input type="number" name="hermanos" id="hermanos" value=0>
        </label><br />

        <label for="sueldo">Sueldo: </label>
        <input type="number" name="sueldo" id="sueldo"
            value=1100><br>

        <input type="submit" class="boton" value="Validar" name="cr">

    </form>
<?php
}
