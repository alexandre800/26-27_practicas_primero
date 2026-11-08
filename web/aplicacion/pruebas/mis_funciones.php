<?php

/**
 * funcion que devuelve un numero
 * Si el número es menor de 10 se devuelve un error
 *
 * @param integer $num -> numero al que aplicar el doble
 * @return integer|false -> devuelve el doble del argumento o false en caso de error
 */
function doble(int $num): int|false
{
   //$num es menor de 10, consideramos que hay un error 
   if ($num < 10)
      return false;

   return 2 * $num;
}

function variosParametros(int $par1, string $par2 = "", float $par3 = 10.0): int|float
{

   $cadena = "";
   $cadena .= $par2;

   if (is_integer($par2))
      $par2 = intval($par2);
   else
      $par2 = 0;

   $par3 += $par1 + $par2;
   return $par3;
}

function suma1(float $a, float $b, float ...$resto): float
{

   $res = $a + $b;
   // for ($i = 0; $i < func_num_args(); $i++) {

   foreach ($resto as $num)
      $res += $num;

   return $res;
}
