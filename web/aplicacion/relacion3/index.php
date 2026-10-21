<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include_once("libreria.php");

$barra = [
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 3", "ENLACE" => "index.php"],
];


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relación 3", $barra);
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo()
{

    echo "<h1>Ejercicio 1</h1>";

    $vector = array();
    $numero = 0;

    echo "Resultado de cuentaVeces(): ".
    (cuentaVeces($vector, "1osición", 7, $numero) ? "se ha ejecutado sin problema" : "ha fallado la función");
    echo ", número de llamadas: ".$numero."<br>";
    
    echo "Resultado de cuentaVeces(): ".
    (cuentaVeces($vector, "otra", 2, $numero) ? "se ha ejecutado sin problema" : "ha fallado la función");
    echo ", número de llamadas: ".$numero."<br>";

    //este falla al poner 2daw como posición asociativa
    echo "Resultado de cuentaVeces(): ".
    (cuentaVeces($vector, "2daw", 6, $numero) ? "se ha ejecutado sin problema" : "ha fallado la función");
    echo ", número de llamadas: ".$numero."<br>";

    //Muestro el array
    echo "<br>Array: <br>";
    foreach($vector as $i=>$valor){
        echo "Posición ".$i.", valor ".$valor."<br>";
    }


    echo "<br><h1>Ejercicio 2</h1>";

    $cadena=generarCadena(7);
    echo "Genero una cadena con 7 caracteres: ".($cadena ? $cadena : "no se puede generar una cadena negativa")."<br>";

    $cadena=generarCadena();
    echo "Genero una cadena con 10 caracteres (por defecto): ".($cadena ? $cadena : "no se puede generar una cadena negativa")."<br>";

    $cadena=generarCadena(-2);
    echo "Genero una cadena con -2 caracteres: ".($cadena ? $cadena : "no se puede generar una cadena negativa")."<br>";


    echo "<br><h1>Ejercicio 3</h1>";
    echo "Operaciones (operación 1, operandos [2, 5]): ".operaciones(1,2,5)."<br>";
    echo "Operaciones (operación 2, operandos [4, 5, 6, 7]): ".operaciones(2, 4, 5, 6, 7)."<br>";
    echo "Operaciones (operación 3, operandos [4, 5, 9]): ".operaciones(3, 4, 5, 9)."<br>";
    echo "Operaciones (operación 23, operandos [4, 5, 3, 8, 1, 3, 7, 2]): ".operaciones(23, 4, 5, 3, 8, 1, 3, 7, 2)."<br>";


    echo "<br><h1>Ejercicio 4</h1>";
    
    $num1=1;
    echo "Devuelve (1, 2, 3)-> multiplicación: ".devuelve($num1,2,3).", suma: ".$num1."<br>";
    
    $num1=1;
    echo "Devuelve (1)-> multiplicación: ".devuelve($num1).", suma: ".$num1."<br>";
    
    $num1=1;
    echo "Devuelve (1, 5)-> multiplicación: ".devuelve($num1, 5).", suma: ".$num1."<br>";

    $num1=1;
    echo "Devuelve (1, parámetro no especificado, 4)-> multiplicación: ".devuelve($num1, num3:4).", suma: ".$num1."<br>";
}