<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 5", "ENLACE" => "index.php"],
];

//inicializaciones
$datos = [
    "nombre" => "",
    "passwd" => "",
    "fechaNac" => "",
    "horaLev" => "",
    "estado" => 0,
    "sueldo" => 0
];
$errores = [];

//comprobar si se ha dado a insertar
// if ($_POST) {
if (isset($_POST["cr"])) {
    
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

        fecha carnet

        <label for="horaLev">Hora de levantarse: </label>
        <input type="text" name="horaLev" id="horaLev"
            value="<?php echo $datos["horaLev"]; ?>"><br>

        Estado:<br />
        <input type="checkbox" name="estado[]" value=1 />
        Estudiante <br />
        <input type="checkbox" name="estado[]" value=2 />
        En paro<br />
        <input type="checkbox" name="estado[]" value=3 />
        Trabajando <br />
        <input type="checkbox" name="estado[]" value=4 />
        Jubilado<br />

        estudios
        hermanos

        <label for="sueldo">Sueldo: </label>
        <input type="number" name="sueldo" id="sueldo"
            value="<?php echo $datos["sueldo"]; ?>"><br>

        <input type="submit" class="boton" value="Validar" name="cr">
        
    </form>
<?php
}