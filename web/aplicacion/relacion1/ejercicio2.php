<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 1", "ENLACE" => "index.php"],
    ["TEXTO" => "ejercicio 2", "ENLACE" => "ejercicio2.php"]
];
//controlador
const N = 1000; //constante para el número de tiradas
$array1 = [];
$array2 = [];

//relleno el array con 6 lanzamientos
for ($i = 0; $i < 6; $i++) {
    $array1[$i] = mt_rand(1, 6);
}

//relleno el segundo array con 1000 lanzamientos (con while y mt_rand sin parámetros)
$i = 0;
while ($i < N) {
    $array2[$i] = mt_rand() % 6 + 1;
    $i++;
}

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 2", $barra);
cuerpo($array1, $array2); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($array1, $array2)
{
    //en la vista se muesta el primer array usando foreach
    foreach ($array1 as $i => $valor) {
        echo "Lanzamiento " . ($i + 1) . " del dado: " . $valor . "<br>";
    }

    //se muestra el segundo array
    echo "<br>El dado se ha lanzado " . N . " veces<br>";
    for ($num = 1; $num <= 6; $num++) {
        $repet = 0;
        for ($i = 0; $i < count($array2); $i++) {
            if ($array2[$i] == $num)//si la tirada da el número que buscamos, se suma 1 a $repet
                $repet++;
        }
        //se muestran las veces que sale un número de las 1000 tiradas
        echo "El número " . $num . " ha salido " . $repet . " con un porcentaje de " . ($repet * 100 / N) . "%<br>";
    }
}
