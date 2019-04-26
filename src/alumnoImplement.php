<?php
require_once("Alumno.php");
require_once("entradaImplements.php");

Class AlumnoI implements Alumno{

  //Atributos
  private $id;
  private $firstName;
  private $lastName;  
  private $email;
  private $birthdate;
  private $dischargeDate;

  //Constructor
  public function __construct( $id, $firstName, $lastName, $email, $birthdate, $dischargeDate){    
    $this->id = $id;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->birthdate = $birthdate;
    $this->dischargeDate = $dischargeDate;
  
  }
	
	public function getId():int{
    return $this->id;
  }

  public function getFirstName():string{
    return $this->firstName;
  }

  public function getLastName():string{
    return $this->lastName;
  }

  public function getEmail(){
    return $this->email;
  }

	public function setEmail(string $pEmail){
    $this->email = $email;
    return $this;
  }
	
	public function getBirthdate(){
    return $this->birthdate;
  }

	public function getDischargeDate():DateTime{
    return $this->dischargeDate;
  }
	
	public static function get_alumno_by_id($pId){
    return $pId;
  }
	
	public static function get_alumno_by_email(string $pEmail){
    return $pEmail;
  }
	
	public function tengo_entradas_en_el_blog(): bool{
    $conexion = $this->getBaseDatos();
    $result = $conexion->query('select count(id) from posts where author_id = '. $this->id);
    $row = $result->fetch_row();
    if ($row[0] > 0){
      $flag = true;
    }else{
      $flag = false;
    }
    return $flag;
  }

	public function soy_mayor_de_edad(): bool{
    $conexion = $this->getBaseDatos();
    $result = $conexion->query('SELECT TIMESTAMPDIFF( YEAR, birthdate, now() ) AS Age from authors where id= '. $this->id);
    $row = $result->fetch_row();
    if ($row[0] >=18){
      $flag = true;
    }else{
      $flag = false;
    }
    return $flag;
  }

	public function all_mis_entradas_en_el_blog() : array{
    $conexion = $this->getBaseDatos();
    $result = $conexion->query('select * from posts where author_id ='. $this->id);
    $misEntradas = [];  
    while($row = $result->fetch_object()){
      $entrada = new EntradaI($row->id, $row->author_id, $row->title, $row->description, $row->content, $row->date);     
      array_push($misEntradas,$entrada);
    } 
    return $misEntradas;
  }

	public function all_mis_entradas_en_el_blog_tituladas(string $pPattern):array{
    
    $conexion = $this->getBaseDatos();
    $result = $conexion->query("select * from posts where title like '%".$pPattern."%' and author_id = 406");
    $misTitulos = [];  
    while($row = $result->fetch_object()){
      $titulo = new EntradaI($row->id, $row->author_id, $row->title, $row->description, $row->content, $row->date);     
      array_push($misTitulos,$titulo);
    } 
    return $misTitulos;
  }

	public function all_mis_entradas_en_el_blog_contienen(string $pPattern){
    $conexion = $this->getBaseDatos();
    $result = $conexion->query("select * from posts where content like '%".$pPattern."%' and author_id = 406");    
    $misContenidos = [];  
    while($row = $result->fetch_object()){
      $contenido = new EntradaI($row->id, $row->author_id, $row->title, $row->description, $row->content, $row->date);     
      array_push($misContenidos,$contenido);
    } 
    return $misContenidos;  
  }
	
	public function remove_mis_entradas_en_el_blog_tituladas(string $pPattern){
    return $array;  
  }
	
	public function remove_mis_entradas_en_el_blog_contienen(string $pPattern){
    return $array;  
  }
	
	public function nueva_entrada_en_blog(string $pTitulo, string $pDescripcion, string $pContenido){
    return $array;
  }
  
  private function getBaseDatos(){
    $conexion = new mysqli("127.0.0.1" , "dwcs" , "abc123." , "dwcs_mysqli_dbo");
    return $conexion;
  }

}