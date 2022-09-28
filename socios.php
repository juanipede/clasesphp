<?php

ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

//Definicion de clases
class Persona{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __get($propiedad) {
        return $this->$propiedad;     
    }
    public function __set($propiedad, $valor){
        $this->$propiedad = $valor;
    }
}

class Cliente extends Persona{
    private $aTarjetas;
    private $bActivo;
    private $fechaAlta;
    private $fechaBaja;

    public function __construct(){
        $this->aTarjetas = array();
        $this->bActivo = true;
        $this->fechaAlta = date("d/m/Y");
    }

    public function __get($propiedad) {
        return $this->$propiedad;     
    }

    public function __set($propiedad, $valor){
        $this->$propiedad = $valor;
    }

    public function agregarTarjeta($tarjeta){
        $this->aTarjetas[] = $tarjeta;
    }

    public function darDeBaja($fecha){
        $this->fechaBaja = $fecha;
        $this->bActivo = false; //Baja logica (por defecto en el construct el bActivo esta en true, lo ponemos en false.)
    }

    public function imprimir(){

    }
}

class Tarjeta{
    private $nombreTitular;
    private $numero;
    private $fechaEmision;
    private $fechaVto;
    private $tipo;
    private $cvv;

    const VISA = "VISA";
    const MASTERCARD = "Mastercard";
    const AMEX = "American Express";
    const CABAL = "CABAL";


    public function __construct($tipo, $numero, $fechaEmision, $fechaVto, $cvv){
        $this->numero = $numero;
        $this->fechaEmision = $fechaEmision;
        $this->fechaVto = $fechaVto;
        $this->tipo = $tipo;
        $this->cvv = $cvv;
    }

    public function __get($propiedad) {
        return $this->$propiedad;     
    }
    public function __set($propiedad, $valor){
        $this->$propiedad = $valor;
    }
}  

//Programa
$cliente1 = new Cliente();
$cliente1->dni ="35123789" ;
$cliente1->nombre ="Ana Valle" ;
$cliente1->correo ="ana@correo.com" ;
$cliente1->celular ="1156781234" ;
$tarjeta1=new Tarjeta(Tarjeta::VISA, "4223750778806383", "06/2021", "01/2025", "275");
$tarjeta2=new Tarjeta(Tarjeta::AMEX, "4223750778806383", "09/2020", "04/2024", "341");
$tarjeta3=new Tarjeta(Tarjeta::MASTERCARD, "4223750778806383", "02/2019", "07/2026", "2040");
$cliente1->agregarTarjeta($tarjeta1);
$cliente1->agregarTarjeta($tarjeta2);
$cliente1->agregarTarjeta($tarjeta3);

$cliente2 = new Cliente();
$cliente2->dni ="48456876";
$cliente2->nombre ="Bernabe Paz";
$cliente2->correo ="bernabe@correo.com";
$cliente2->celular ="1145326787";
$cliente2->agregarTarjeta(new Tarjeta(Tarjeta::VISA, "4969508071710316","01/2022", "08/2025", "865"));
$cliente2->agregarTarjeta(new Tarjeta(Tarjeta::MASTERCARD, "5149107669552238", "07/2019", "04/2025", "554"));
$cliente2->darDeBaja(Date("30/09/2022"));

print_r($cliente1);
print_r($cliente2);
//MINUTO 1.37.20 !!!!!!!!!
?>