<?php

/**
 * Se pone $num1 en la posición asociativa $cadena del array $array, 
 * y se guardan las llamadas totales a la función en $num2
 * Devuelve false si la cadena vale "2daw" o "primera", o hay algún fallo, true si todo va bien
 *
 * @param array $array
 * @param string $cadena -> por referencia, se actualiza el array
 * @param integer $num1
 * @param integer $num2 -> por referencia, se añade 1 por cada llamada al método
 * @return boolean
 */
function cuentaVeces(array &$array, string $cadena, int $num1, int &$num2): bool
{

    $num2++;

    if ($cadena === "2daw" || $cadena === "primera")
        return false;

    $array[$cadena] = $num1;
    return true;
}

/**
 * Genera una cadena aleatoria a partir de $caracteres, de la longitud $num
 *
 * @param integer $num -> si se llama a la función sin parámetros, es 10 por defecto
 * @return string (devuelve false si el número es menor o igual que 0)
 */
function generarCadena(int $num = 10): string | false
{

    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $cadena="";

    if($num<=0)
        return false;

    while (mb_strlen($cadena) < $num) {
        //coge el caracter de una posición aleatoria de $caracteres
        $cadena .= $caracteres[mt_rand(0, mb_strlen($caracteres) - 1)];
    }

    return $cadena;
}

function operaciones(int $op, float $num1, float ...$numeros): float | false
{

    $res=0;
    if($op===1){
        $res=$num1;
        foreach($numeros as $num){
            $res+=$num;
        }
    }else if($op===2){
        $res=$num1;
        foreach($numeros as $num){
            $res-=$num;
        }
    }else if($op===3){
        $res=$num1;
        foreach($numeros as $num){
            $res*=$num;
        }
    }else{
        $pares=0;
        $impares=$num1;
        for($i=0; $i<count($numeros); $i++){
            if($i%2==0)
                $pares+=$numeros[$i];
            else
                $impares+=$numeros[$i];
        }
        $res=$pares-$impares;
    }

    return $res;

}