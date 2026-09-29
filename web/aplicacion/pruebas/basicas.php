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

    ?>

<?php
}
