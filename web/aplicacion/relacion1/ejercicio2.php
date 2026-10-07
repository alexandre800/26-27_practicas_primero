<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "relación 1", "ENLACE" => "index.php"]
];
//controlador
const N=1000;//constante para el número de tiradas
$array1=[];
$array2=[];

for($i=0; $i<6; $i++){
    $array1[$i] = mt_rand(1, 6);
}


for($i=0; $i<N; $i++){
    $array2[$i] = mt_rand(1,6);
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
function cuerpo($array1, $array2){

    echo "Lanzamiento 1 del dado: ".$array1[0]."<br>";
    echo "Lanzamiento 2 del dado: ".$array1[1]."<br>";
    echo "Lanzamiento 3 del dado: ".$array1[2]."<br>";
    echo "Lanzamiento 4 del dado: ".$array1[3]."<br>";
    echo "Lanzamiento 5 del dado: ".$array1[4]."<br>";
    echo "Lanzamiento 6 del dado: ".$array1[5]."<br><br>";

    echo "El dado se ha lanzado ".N." veces<br>";

    $veces1 = sacarVeces($array2, 1);
    $veces2 = sacarVeces($array2, 2);
    $veces3 = sacarVeces($array2, 3);
    $veces4 = sacarVeces($array2, 4);
    $veces5 = sacarVeces($array2, 5);
    $veces6 = sacarVeces($array2, 6);

    echo "El número 1 ha salido ".$veces1." con un porcentaje de ".($veces1*100/N)."%<br>";
    echo "El número 2 ha salido ".$veces2." con un porcentaje de ".($veces2*100/N)."%<br>";
    echo "El número 3 ha salido ".$veces3." con un porcentaje de ".($veces3*100/N)."%<br>";
    echo "El número 4 ha salido ".$veces4." con un porcentaje de ".($veces4*100/N)."%<br>";
    echo "El número 5 ha salido ".$veces5." con un porcentaje de ".($veces5*100/N)."%<br>";
    echo "El número 6 ha salido ".$veces6." con un porcentaje de ".($veces6*100/N)."%<br>";

}

function sacarVeces($array, $num){

    $repet=0;
    for($i=0; $i<count($array); $i++){
        if($array[$i]==$num)
            $repet++;
    }

    return $repet;
}
