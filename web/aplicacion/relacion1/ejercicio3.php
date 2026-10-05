<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador

//primer array creado en varias líneas
$array1 = [];
$array1[1] = "a";
$array1[16] = "e";
$array1[54] = "o";
$array1[] = 34;
$array1["uno"] = "cadena";
$array1["dos"] = true;
$array1["tres"] = 1.345;
$array1["ultima"] = [1, 34, "nueva"];

//segundo array creado en una sola sentencia con array()
$array2 = array(1 => "a", 16 => "e", 54 => "o", 34, "uno" => "cadena", "dos" => true, "tres" => 1.345, "ultima" => array(1, 34, "nueva"));

//tercer array creado en una sola sentencia con [] 
$array3 = [1 => "a", 16 => "e", 54 => "o", 34, "uno" => "cadena", "dos" => true, "tres" => 1.345, "ultima" => array(1, 34, "nueva")];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3");
cuerpo($array1, $array2, $array3); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($array1, $array2, $array3)
{

    echo "Recorro el array 1: <br>";
    recorreForEach($array1);

    echo "<br><br>Recorro el array 2: <br>";
    recorreForEach($array2);

    echo "<br><br>Recorro el array 3: <br>";
    recorreForEach($array3);

}

//función para recorrer un arrray y mostrarlo en la vista
function recorreForEach($array){

    foreach ($array as $indice => $valor) {
        if (!is_array($valor))
            echo $indice . ": " . $valor . ", ";
        else {//si el elemento es otro array, hay que recorrerlo con otro foreach
            echo $indice . ": (";
            foreach ($valor as $indice2 => $valor2) {
                echo $indice2 . ": " . $valor2 . ", ";
            }
            echo ")";
        }
    }

}