<?php

namespace VALFILTER;

/**
 * Undocumented function
 *
 * @param integer $var
 * @param integer $min
 * @param integer $max
 * @param integer $defecto
 * @return boolean
 */
function validaEntero(int &$var, int $min, int $max, int $defecto): bool
{

    $o = [
        "options" => [
            "min_range" => $min,
            "max_range" => $max
        ]
    ];

    if (!filter_var($var, FILTER_VALIDATE_INT, $o)) {
        $var = $defecto;
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
function validaReal(float &$var, float $min, float $max, float $defecto): bool
{

    $o = [
        "options" => [
            "min_range" => $min,
            "max_range" => $max
        ]
    ];

    if (!filter_var($var, FILTER_VALIDATE_FLOAT, $o)) {
        $var = $defecto;
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
function validaFecha(string &$var, string $defecto): bool
{

    $var = trim($var);
    if ($fecha = \DateTime::createFromFormat('d/m/Y', $var)) {
        $var = $fecha->format("d/m/Y");
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
function validaHora(string &$var, string $defecto): bool
{

    $var = trim($var);
    $partes = explode(":", $var);
    if (count($partes) === 3) {
        $var = str_pad($partes[0], 2, '0', STR_PAD_LEFT) . ':' .
            str_pad($partes[1], 2, '0', STR_PAD_LEFT) . ':' .
            str_pad($partes[2], 2, '0', STR_PAD_LEFT);
    }

    if ($hora = \DateTime::createFromFormat('H:i:s', $var)) {
        $var = $hora->format("H:i:s");
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
function validaEmail(string &$var, string $defecto): bool
{

    $var = trim($var);
    if (!filter_var($var, FILTER_VALIDATE_EMAIL)) {
        $var = $defecto;
        return false;
    }

    return true;
}

/**
 * Undocumented function
 *
 * @param string $var
 * @param integer $longitud
 * @param string $defecto
 * @return boolean
 */
function validaCadena(string &$var, int $longitud, string $defecto): bool
{

    //$var = trim($var);
    $o = [
        "options" => [
            "regexp" => "/^[\S]{0,".$longitud."}$/"
        ]
    ];

    if (!filter_var($var, FILTER_VALIDATE_REGEXP, $o)) {
        $var=$defecto;
        return false;
    }

    return true;
}

/**
 * Undocumented function
 *
 * @param string $var
 * @param string $expresion
 * @param string $defecto
 * @return boolean
 */
function validaExpresion(string &$var, string $expresion, string $defecto): bool
{
    $var = trim($var);
    $o = [
        "options" => [
            "regexp" => $expresion
        ]
    ];

    if (!filter_var($var, FILTER_VALIDATE_REGEXP, $o)) {
        $var=$defecto;
        return false;
    }

    return true;
}

/**
 * Undocumented function
 *
 * @param mixed $var
 * @param array $posibles
 * @param integer $tipo
 * @return boolean
 */
function validaRango(mixed $var, array $posibles, int $tipo = 1): bool {

    if($tipo===2)
        $array=array_keys($posibles);
    else
        $array=$posibles;

    foreach ($array as $elem) {
        if ($elem === $var)
            return true;
    }

    return false;
}
