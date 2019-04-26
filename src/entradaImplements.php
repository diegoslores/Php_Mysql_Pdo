<?php
require_once("Entrada.php");

Class EntradaI implements Entrada{
    
  //Atributos
    private $id;
    private $author_id;
    private $title;  
    private $description;
    private $content;
    private $date;

  //constructor
  
  public function __construct( $id, $author_id, $title, $description, $content, $date){    
    $this->id = $id;
    $this->author_id = $author_id;
    $this->title = $title;
    $this->description = $description;
    $this->content = $content;
    $this->date = $date;  
  }

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