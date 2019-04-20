<?php
require_once("Entrada.php");

Class EntradaI implements Entrada{
	public function getId():int{
    return $id;
  }
	
	public function getAlumno():Alumno{
    return $alumno;
  }
	
	public function getTitulo():string{
    return $titulo;
  }
	
	public function getContent():string{
    return $content;
  }
	
	public function getDescripction():string{
    return $description;
  }
	
	public function getDate(){
    return $date;
  }
}