<?php
class ClaseDinamica
{
    public function metodoExiste()
    {
        echo "este método existe";
    }
    //se cargaría si no existe el método visible 
    public function __call(string $nombre, array $argumentos): mixed
    {
        $cadena = implode(',', $argumentos);

        echo "se ha llamado al metodo $nombre con argumentos $cadena";
    }

    //se cargaría si no existe el método estático 
    //visible 
    public static function __callStatic(string $nombre, array
    $argumentos): mixed
    {
        $cadena = implode(',', $argumentos);

        echo "se ha llamado al metodo estático $nombre con argumentos $cadena";
    }
}

$obj = new ClaseDinamica();

//el metodo existe se llama directamente a el 
$obj->metodoExiste();


//el método no existe y es a nivel de objeto 
//se llama de forma automática a __call 
$obj->metodoNoExiste();

//el método no existe y es a nivel de clase 
//se llama de forma automática a __callStatic 
ClaseDinamica::metodoNoExiste();
