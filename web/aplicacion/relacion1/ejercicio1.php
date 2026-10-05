<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador

//datos basicos


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1");
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo(){

    echo "Aproximación de 3.8 con round: ".round(3.8)."<br>";
    echo "Aproximación de 3.8 con floor: ".floor(3.8)."<br>";
    echo "3 elevado a 4: ".pow(3, 4)."<br>";
    echo "Raíz cuadrada de 16: ".sqrt(16)."<br>";
    echo "3 en hexadecimal: " . dechex(3) . "<br>";

    $numero_base4 = 310;
    $numero_decimal = base_convert($numero_base4, 4, 10);//primero se pasa a decimal
    $numero_base8 = decoct($numero_decimal);//de decimal a octal
    echo "Pasar el número 310 en base 4 a base 8: ".$numero_base8 . "<br>";

     //valor absoluto: número sin tener en cuenta el signo
    echo "Valor absoluto de -2.67: ". abs(-2.67). "<br>";
    
    //max: determina el valor más grande entre dos números
    echo "El mayor entre 4 y 6 es: ". max(4,6). "<br><br>";

    $numero_binario = 10010;
    $numero_octal = 127;
    $numero_hexadecimal = 0x1A;

    echo "Número binario: ". $numero_binario.", número octal: "
        .$numero_octal.", número hexadecimal: ". dechex($numero_hexadecimal)."<br>";
    echo "Los mismos números en orden, expresados en decimal: Número binario: "
        . base_convert($numero_binario, 2, 10).", número octal: ".base_convert($numero_octal, 8, 10).
        ", número hexadecimal: ". $numero_hexadecimal."<br>";//se transforma a hexadecimal directamente

}

