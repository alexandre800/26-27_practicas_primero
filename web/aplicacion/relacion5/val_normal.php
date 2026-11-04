<?php
namespace VALNORMAL;


/**
 * Undocumented function
 *
 * @param integer $var
 * @param integer $min
 * @param integer $max
 * @param integer $defecto
 * @return boolean
 */
function validaEntero(int &$var, int $min, int $max, int $defecto):bool{

    //falso si no está entre min y max
    if( $var<$min || $var>$max){
        $var=$defecto;
        return false;
    }

    return true;
}

/**
 * Undocumented function
 *
 * @param float $var
 * @param float $min
 * @param float $max
 * @param float $defecto
 * @return boolean
 */
function validaReal(float &$var, float $min, float $max, float $defecto):bool{

    //falso si no está entre min y max
    if( $var<$min || $var>$max){
        $var=$defecto;
        return false;
    }

    return true;

}

/**
 * Undocumented function
 *
 * @param string $var
 * @param string $defecto
 * @return boolean
 */
function validaFecha(string &$var, string $defecto):bool{

    if($fecha = \DateTime::createFromFormat('d/m/Y', $var)){
        $var=$fecha->format("d/m/Y");
        return true;
    }
    
    $var = $defecto;
    return false;

}

/**
 * Undocumented function
 *
 * @param string $var
 * @param string $defecto
 * @return boolean
 */
function validaHora(string &$var, string $defecto):bool {

    if($hora = \DateTime::createFromFormat('H:i:s', $var)){
        $var=$hora->format("H:i:s");
        return true;
    }
    
    $var = $defecto;
    return false;

}

/**
 * Undocumented function
 *
 * @param string $var
 * @param string $defecto
 * @return boolean
 */
function validaEmail(string &$var, string $defecto):bool{

}

/**
 * Undocumented function
 *
 * @param string $var
 * @param integer $longitud
 * @param string $defecto
 * @return boolean
 */
function validaCadena(string &$var, int $longitud, string $defecto):bool{

}

/**
 * Undocumented function
 *
 * @param string $var
 * @param string $expresion
 * @param string $defecto
 * @return boolean
 */
function validaExpresion(string &$var, string $expresion, string $defecto):bool{

}

/**
 * Undocumented function
 *
 * @param mixed $var
 * @param array $posibles
 * @param integer $tipo
 * @return boolean
 */
function validaRango(mixed $var, array $posibles, int $tipo=1):bool{

}