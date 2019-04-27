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
    return $this->id;
  }
	
	public function getAlumno():Alumno{
    return $this->author_id;
  }
	
	public function getTitulo():string{
    return $this->title;
  }
	
	public function getContent():string{
    return $this->content;
  }
	
	public function getDescripction():string{
    return $this->description;
  }
	
	public function getDate(){
    return $this->date;
  }
}