<?php
require_once("Profesor.php");

class Profesor extends Profesor {
	
	public function get_all_alumnos_mayores_de_edad(){
    echo("cosas");
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
    echo("cosas");
  }	

	public function get_alumno_by_email(string $pEmail){
    echo("cosas");
  }
	
}