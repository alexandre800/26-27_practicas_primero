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

/**
 * Función a la que le llega un entero con el tipo de operación, un operando, y uno o varios operandos más
 * Según la operación indicada, se suman, restan o multiplican los operandos, o a los operandos en posiciones
 * pares se le restan los impares
 *
 * @param integer $op
 * @param float $num1
 * @param float ...$numeros
 * @return float
 */
function operaciones(int $op, float $num1, float ...$numeros): float
{

    $res=0;
    if($op===1){//se suman si $op==1
        $res=$num1;
        foreach($numeros as $num){
            $res+=$num;
        }
    }else if($op===2){//se restan si $op==2
        $res=$num1;
        foreach($numeros as $num){
            $res-=$num;
        }
    }else if($op===3){//se multiplican si $op==3
        $res=$num1;
        foreach($numeros as $num){
            $res*=$num;
        }
    }else{//se restan pares e impares si $op tiene cualquier otro valor
        $pares=0;
        $impares=$num1;//num1 estaría en posición 1 (impar)
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

/**
 * Se devuelve la multiplicación de los tres parámetros (números)
 * Se suman los 3 parámetros y se guarda el resultado en $num1, pasado por referencia
 *
 * @param integer $num1
 * @param integer $num2
 * @param integer $num3
 * @return integer
 */
function devuelve(int &$num1, int $num2=10, int $num3=10): int
{

    $res=$num1*$num2*$num3;
    $num1+=$num2+$num3;

    return $res;
}

/**
 * Suma el parámetro 1 con el parámetro 2
 *
 * @param integer $num1
 * @param integer $num2
 * @return integer
 */
function suma(int $num1, int $num2): int{
    return $num1+$num2;
}

/**
 * Resta el parámetro 1 con el parámetro 2
 *
 * @param integer $num1
 * @param integer $num2
 * @return integer
 */
function resta(int $num1, int $num2): int{
    return $num1-$num2;
}

/**
 * Multiplica el parámetro 1 por el parámetro 2
 *
 * @param integer $num1
 * @param integer $num2
 * @return integer
 */
function multiplicacion(int $num1, int $num2): int{
    return $num1*$num2;
}

/**
 * Recibe una cadena que debe estar entre tres valores ("suma", "resta", "multiplicacion"),
 * si no lo está devuelve false, en caso contrario, se usa la cadena como variable función
 * para calcular una de las tres posibles operaciones, y devolver el resultado
 *
 * @param string $cadena
 * @param integer $num1
 * @param integer $num2
 * @return int | false
 */
function hacerOperacion(string $cadena, int $num1, int $num2): int | false{

    $opValidas = ["suma", "resta", "multiplicacion"];

    if(!in_array($cadena, $opValidas, true))
        return false;

    return $cadena($num1, $num2);
}

/**
 * se llama a una función que se especifica en la llamada para que haga un cálculo 
 * entre $num1 y $num2, devuelve su resultado
 *
 * @param integer $num1
 * @param integer $num2
 * @param callable $funcion
 * @return integer
 */
function llamadaAFuncion(int $num1, int $num2, callable $funcion): int{

    return $funcion($num1, $num2);

}

/**
 * ordena un array usando la funcion usort, que implementa la funcion que se pasa
 * como parámetro, devuelve el array ordenado
 *
 * @param array $array
 * @param callable $function
 * @return array
 */
function ordenar(array $array, callable $function): array{

    usort($array, $function);
    return $array;

}