<?php
require_once("Profesor.php");
require_once("alumnoImplement.php");

class ProfesorI implements Profesor {
	//Atributos
  private $id;

  //Constructor
  public function __construct(){

    $this->id = 1;
   
    
  }
	
	public function get_all_alumnos_mayores_de_edad(){
    $this->getBaseDatos();
    $mayoresEdad = array();
    foreach($this->alumnos as $alumno){
      if($alumno->eresMayorEdad()) array_push($mayoresEdad, $alumno);
    }
    return $mayoresEdad;
  }
	
	public function get_all_alumnos_menores_de_edad(){
    echo("cosas");
  }
	
	public function get_all_alumnos_con_email_incorrecto(){
    echo("cosas");
  }

	public function alumnos_no_escribieron_en_blog():array{
    echo("cosas");
  }
	
	public function get_all_alumnos_con_email_de_dominio(string $pDominio){
    echo("cosas");
  }
	
	public function get_alumno_by_id($pId){
    $conexion = $this->getBaseDatos();
    $results = $conexion->query('select id, first_name, last_name, email, birthdate, added from authors where id = '. $pId);
    $record = $results->fetch_object();
    $alumno;
    while($record != null){
      $alumno = new alumnoI($record);
      $record = $results->fetch_object();
    }
    return $alumno;
  }	

	public function get_alumno_by_email(string $pEmail){
    echo("cosas");
  }

  private function getBaseDatos(){
    $conexion = new mysqli("127.0.0.1" , "dwcs" , "abc123." , "dwcs_mysqli_dbo");
    return $conexion;
  }
	
}