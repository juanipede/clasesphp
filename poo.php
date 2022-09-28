<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona {
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;
    
    
    public function __destruct(){
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

    public function setDni($dni){ $this->dni = $dni; }
    public function getDni(){ return $this->dni;}
    
    public function setNombre($nombre){ $this->nombre = $nombre;}
    public function getNombre(){ return $this->nombre;}
    
    public function setNacionalidad($nacionalidad){$this->nacionalidad = $nacionalidad;}
    public function getNacionalidad(){ return $this->nacionalidad;}
    
    public function setEdad($edad){$this->edad = $edad;}
    public function getEdad(){ return $this->edad; }
    
    public function imprimir(){}
}

class Alumno extends Persona{ //Añadiendo "extends Persona" le decimos que ademas de Alumno, es tambien Persona.
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;
    
    public function __construct(){
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }
    
    public function __destruct(){
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Legajo: " . $this->legajo . "<br>";
        echo "Nota Portfolio: " . $this->notaPortfolio . "<br>";
        echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
        echo "Nota PHP: " . $this->notaPhp . "<br>"; 
        echo "Promedio de notas: " . number_format($this->calcularPromedio(), 2, ",", ".") . "<br><br>";
    }
    
    public function calcularPromedio(){
        $promedio = ($this->notaPhp + $this->notaPortfolio + $this->notaProyecto)/3;
        return $promedio;
    }
}

class Docente extends Persona{
    private $especialidad;
    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";

    public function __destruct(){
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }
    public function imprimir(){
        echo "Nombre: " . $this->nombre . "<br>";
    }

    public function imprimirEspecialidadesHabilitadas(){
        echo "Un docente puede tener las siguientes especialidades:<br>";
        echo "Especialidad 1: " . self::ESPECIALIDAD_WP . "<br>";
        echo "Especialidad 2: " . self::ESPECIALIDAD_ECO . "<br>";
        echo "Especialidad 3: " . self::ESPECIALIDAD_BBDD . "<br><br>";
    }
    
}

//PROGRAMA
$alumno1 = new Alumno(); //quiere decir que alumno1 es un Alumno .
$alumno1->setDni("39491154");
$alumno1->setNombre("Juan Pedevilla");
$alumno1->notaPhp = 7;
$alumno1->notaPortfolio = 9;
$alumno1->notaProyecto = 8.50;
$alumno1->imprimir();

$alumno2 = new Alumno(); 
$alumno2->dni = "56871135";
$alumno2->nombre = "Nadia Benitez";
$alumno2->notaPhp = 8.5;
$alumno2->notaPortfolio = 7;
$alumno2->notaProyecto = 10;
$alumno2->imprimir();

$docente1 = new Docente();
$docente1->nombre = "Ramon Gonzalez";
$docente1->imprimir();
// $docente1->especialidad = Docente::ESPECIALIDAD_BBDD;
$docente1->imprimirEspecialidadesHabilitadas();

//MINUTO 30 CLASE 23 !!!!
?>