<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "Relación 2", "ENLACE" => "index.php"],
    ["TEXTO" => "ejercicio 2", "ENLACE" => "ejercicio2.php"]
];

//controlador
$cadena="Está la niña en casa";

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 2", $barra);
cuerpo($cadena); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($cadena)
{

    //muestro la cadena
    for($i=0; $i<=mb_strlen($cadena)+1; $i++){

        for($i2=0; $i2<=$i; $i2++){
            echo "&nbsp";
        }
        //echo substr($cadena, $i, 1)."<br>"; -> con substr no funciona 
        //porque no identifica los caracteres como "á" y ñ

        //echo $cadena[$i]."<br>"; -> no funciona por la misma razón

        echo mb_substr($cadena, $i, 1)."<br>";//funciona con mb_substr

    }

    //cadena a la inversa (también se puede hacer con índices negativos, ver correccion)
    for($i=mb_strlen($cadena); $i>=0; $i--){ 

        for($i2=mb_strlen($cadena); $i2>=$i; $i2--){
        // for($i2=0; $i2<=$i; $i2++){
            echo "&nbsp";
        }

        if($i%2==0)
            echo mb_strtoupper(mb_substr($cadena, $i, 1))."<br>";
        else
            echo mb_substr($cadena, $i, 1)."<br>";
    }

    //cadena en partes usando el carácter a
    $cadenaDividida = mb_split("a", $cadena);
    //$cadenaDividida = explode("a", $cadena);
    //$cadenaDividida = preg_split("/a/", $cadena); (expresión regular)

    foreach ($cadenaDividida as $elem) {
        echo $elem."<br>";
    }

    //cambiar el carácter de después de niña por mujer
    echo preg_replace("/(?<=niña)\s/u", "/mujer", $cadena);
    

}
