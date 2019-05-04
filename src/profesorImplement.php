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
    $conexion = $this->getBaseDatos();
    $results = $conexion->query('select * from authors where TIMESTAMPDIFF( YEAR, birthdate, now()) >= 18');    
    $misAlumnos = [];
    while($row = $results->fetch()){
        $alumno = new AlumnoI($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['birthdate'], $row['added']);      
			  array_push($misAlumnos,$alumno);
    }    
    return $misAlumnos;
  }
	
	public function get_all_alumnos_menores_de_edad(){
    $conexion = $this->getBaseDatos();
    $results = $conexion->query('select * from authors where TIMESTAMPDIFF( YEAR, birthdate, now()) < 18');
    $misAlumnos = [];
    while($row = $results->fetch()){
      $alumno = new AlumnoI($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['birthdate'], $row['added']);      
      array_push($misAlumnos,$alumno);
    } 
    return $misAlumnos;
  }
	
	public function get_all_alumnos_con_email_incorrecto(){
    $conexion = $this->getBaseDatos();
    $result = $conexion->query("select * from authors where email REGEXP '(.*)\.(.*)@(.*)\.(.*)' limit 5");
    $misAlumnos = [];
    while($row = $result->fetch()){
      $alumno = new AlumnoI($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['birthdate'], $row['added']);      
      array_push($misAlumnos,$alumno);
    }     
    return $misAlumnos;
  }

	public function alumnos_no_escribieron_en_blog():array{
    $conexion = $this->getBaseDatos();
    $result = $conexion->query('select * from authors where id not in (select author_id from posts)');
    $misAlumnos = [];
    while($row = $result->fetch()){
      $alumno = new AlumnoI($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['birthdate'], $row['added']);      
      array_push($misAlumnos,$alumno);
    }     
    return $misAlumnos;
  }
	
	public function get_all_alumnos_con_email_de_dominio(string $pDominio){    
    $conexion = $this->getBaseDatos();
    $result = $conexion->query("select * from authors where email like '%".$pDominio."'");    
    $misAlumnos = [];
    while($row = $result->fetch()){
      $alumno = new AlumnoI($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['birthdate'], $row['added']);      
      array_push($misAlumnos,$alumno);
    }    
    return $misAlumnos;
  }
	
	public function get_alumno_by_id($pId){
    $conexion = $this->getBaseDatos();
    $results = $conexion->query('select * from authors where id = '. $pId);
    $record = $results->fetch();    
    while($record != null){
      $alumno = new AlumnoI($record['id'], $record['first_name'], $record['last_name'], $record['email'], $record['birthdate'], $record['added']);       $record = $results->fetch();
    }
    return $alumno;
  }	

	public function get_alumno_by_email(string $pEmail){
    $conexion = $this->getBaseDatos();
    $results = $conexion->query("select * from authors where email = '$pEmail';");
    $record = $results->fetch();    
    while($record != null){
      $alumno = new AlumnoI($record['id'], $record['first_name'], $record['last_name'], $record['email'], $record['birthdate'], $record['added']);      
      $record = $results->fetch();
    }
    return $alumno;
  }

  //Función para conectar a la base de datos
  private function getBaseDatos(){
    //$conexion = new mysqli("127.0.0.1" , "dwcs" , "abc123." , "dwcs_mysqli_dbo");
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $conexion = new PDO('mysql:host=127.0.0.1;dbname=dwcs_mysqli_dbo', 'dwcs', 'abc123.', $opciones);
    return $conexion;
  }
	
}