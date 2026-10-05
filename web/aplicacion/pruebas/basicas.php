<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("prubas básicas");
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo(){
?>
    <br><br>
    Elemento de pruebas
    <a href="index.php">inicio</a>

    <?php 
    
        echo "cadena";

        $var1=25;
        $cadena="esto es una cadena";

        $var1+=12;
        echo $var1;

        $una_cadena="hola";
        $unaCadena="adios";
        // $cadena2 = "";

        $var1-=17;

        echo "$var1";

        $unaCadena=45;
        echo $unaCadena;
        
        if(isset($cadena2))//si existe lo muestra
            echo $cadena2;

        $real=1234.56789012345678901;
        $real+=0.53210876549;//los numeros con muchos decimales y no el 
        //mismo numero de ellos dan errores

        echo "una línea".PHP_EOL;
        echo "separada por php_eol en el código".PHP_EOL;//hace que haya un salto de línea en el código
        //y se vea más limpio

        $real = null;

        echo "el número real $real";

        $var = 125;
        $tipo = gettype($var);
        $var = (string)$var;
        $tipo = gettype($var);
        settype($var, "double");
        $tipo = gettype($var);
        $var = intval($var);

        //un 0 numérico o una cadena vacía es equivalente a falso
        if(0)
            $cadena="verdadero";//falso

        if("")
            $cadena="verdadero";//falso

        if("0")
            $cadena="verdadero";//verdadero

        $var = 1+true;
        $var = 1+1.5;
        //$var = 1+"1hola";//se devuelve el número si se puede extraer un número de la cadena (por eso da 2)
        //$var = 1+"1.5hola";//2.5
        //$var = 1+"hola";//error (no se puede sumar string e int)
        //$var = 1+[];//error

        $var = 7;
        if($var==1)
            $cadena="uno";
        elseif ($var==2)
            $cadena="dos";
        else
            $cadena="otro";

        $var = 1;
        switch($var){
            case 1: $cadena="uno";break;
            case 2: $cadena="dos";break;
            default: $cadena="otro";
        }
?>

<?php
}
