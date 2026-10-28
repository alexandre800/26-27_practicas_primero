<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra = [
    ["TEXTO" => "inicio", "ENLACE" => "../../index.php"],
    ["TEXTO" => "pruebas", "ENLACE" => "index.php"],
    ["TEXTO" => "clases", "ENLACE" => "clases.php"]
];

//controlador

/**
 * Clase prueba usada para mostrar el funcionamiento de los
 * distintos elementos
 */
class ClasePrueba
{
    //definición de constantes
    public const PI = 2.14;

    //definición de propiedad
    public int $propPublica = 1;
    private string $_propPrivada = "hola";
    protected float $_propProtegida = 1.234;

    //definición de propiedad estática
    public static $propEstatica = array(1, 2, 3);

    //definición de método
    public function metodo()
    {
        //acceso a las propiedades desde el propio objeto
        $this->propPublica = 13;
        $this->_propPrivada = 100;
        $this->_propProtegida = "adios";
        //acceso a la propiedad estática
        self::$propEstatica[0] = "otra";
        return true;
    }
}

//se crea una instancia de la clase prueba
$instancia = new ClasePrueba();

//accede a la propiedad pública de la instancia
$instancia->propPublica = 50;

//se accede a la propiedad de clase (estática)
ClasePrueba::$propEstatica[1] = 10;
$instancia::$propEstatica[2] = 20;


$datos=["codigo"=>12, "nombre"=>"prueba2"];


class Prueba
{
    private ?int $_codigo;
    private ?string $_nombre;
    //el constructor es privado
    private function __construct(?int $codigo = null, ?string $nombre = null)
    {
        $this->_codigo = $codigo;
        $this->_nombre = $nombre;
    }
    //constructor estatico publico
    public static function desdeDatos(int $codigo, string $nombre): static
    {
        if($codigo<0)
            $codigo=0;
        //creo el objeto usando static
        $obj = new static($codigo, $nombre);
        return $obj;
    }
    //constructor estatico publico
    public static function desdeJson(string $json): static
    {
        $datos = json_decode($json);
        return new static($datos->codigo, $datos->nombre);
    }
}
$datos = ["codigo" => 12, "nombre" => "prueba2"];
$datosJSon = json_encode($datos);
//no hay constructor público, por lo que tengo que
//llamar a las funciones de creación estaticas
$p1 = Prueba::desdeDatos(5, 'Objeto');
$p2 = Prueba::desdeJson($datosJSon);


$programa=Unica::crear(100);
$programa->numero=1;
$segunda=Unica::crear(300);

class Unica{
    private static bool $_creada=false;
    public int $numero=12; 

    private static ?Unica $_objeto=null;
    private function __construct(int $val=0){
        $this->numero=$val;
    }

    public static function crear(int $numero):static{
        if(self::$_creada)
            return self::$_objeto;

        $obj=new static($numero);
        self::$_objeto=$obj;
        self::$_creada=true;

        return self::$_objeto;
    }
}

//se incluye el fichero automáticamente por una línea de código en cabecera
$ins=new Instituto();


//sobrecarga
$clase1=new Clasenormal();
$clase2=new Clasenormal();

$clase1->cadena="hola mundo";

$cad="";
if(isset($clase1->cadena))
    $cad=$clase1->cadena;

if(isset($clase2->cadena))
    $cad=$clase2->cadena;

// $clase1=new ClaseSinsobrecarga();
// $clase1->cadena="adios";
// if(isset($clase1->cadena))
//     $cad=$clase1->cadena;

$clase1=new ClaseSobrecarga();
$val=$clase1->moreno;
$val=$clase1->marcha;
$val=$clase1->numero;
//$val=$clase1->hora;//solo da excepcion en esta


//la clase dinamica guarda las propiedades en un array privado
$clase1=new ClaseDinamica();
$clase2=new ClaseDinamica();
$clase1->nombre="vicente";
$cadena=$clase1->nombre;

$clase1->varPublica=20;
$cadena=$clase2->nombre;

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("clases", $barra);
cuerpo(); //llamo a la vista
finCuerpo();

// **********************************************************
//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <br><br>
    Elemento de pruebas
    <a href="index.php">inicio</a>

    <?php



    ?>

<?php
}
