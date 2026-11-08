<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include_once("./mis_funciones.php");//se incluye, y si se ha incluido ya, no se vuelve a incluirs

$barra=[
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "pruebas", "ENLACE" => "index.php"],
    ["TEXTO" => "funciones", "ENLACE" => "index_funciones.php"]
];

//controlador
$numero=doble(10);
//comprobacion
// if($numero===false){
//     //hay un error, lo resuelve
//     $numero=10;
// }

if(!$numero=doble($numero))
    exit;

$numero2=variosParametros(25, "2aaa", 56);

$numero2=variosParametros(25, par3:100);//valor por defecto en par2

$r=[3,4,5,6,76,7];
$numero2=suma1(1,2,...$r);

$n1=15;
$otra="n1";
//Variable - variable
$numero=$$otra;// $numero=15, hace una referencia a la variable n1 usando el nombre

//variable funcion
$otra="suma1";
$numero=$otra(1,2,...$r);

//funciones anónimas
$func = function (float $a, float $b, float ...$resto): float
{

   $res = $a + $b;
   // for ($i = 0; $i < func_num_args(); $i++) {

   foreach ($resto as $num)
      $res += $num;

   return $res;
};
$numero=$func(1,2,3,4);

//función flecha
$s=fn(int $a, int $b) => $a+$b;
$numero=$s(29,30);

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("funciones", $barra);
cuerpo($numero, $numero2); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo($numero, $numero2){
?>
    <br><br>
    Elemento de pruebas
    <a href="index.php">inicio</a>

    <?php 
    
    echo "el doble del número es ".$numero;
    echo "<br>Número 2: ".$numero2;   

?>

<?php
}
