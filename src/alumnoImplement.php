<?php
require_once("Alumno.php");

Class AlumnoI implements Alumno{

  //Atributos
  private $id;
  private $firstName;
  private $lastName;  
  private $email;
  private $birthdate;
  private $dischargeDate;

  //Constructor
  public function __construct($object){
    $this->id = $object->id;
    $this->firstName = $object->firstName;
    $this->lastName = $object->lastName;
    $this->email = $object->email;
    $this->birthdate = $object->birthdate;
    $this->dischargeDate = $object->dischargeDate;
  }
	
	public function getId():integer{
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
    echo("cosas");
  }
	
	public static function get_alumno_by_email(string $pEmail){
    echo("cosas");
  }
	
	public function tengo_entradas_en_el_blog(): bool{
    echo("cosas");
  }

	public function soy_mayor_de_edad(): bool{
    echo("cosas");
  }

	public function all_mis_entradas_en_el_blog() : array{
    echo("cosas");
  }

	public function all_mis_entradas_en_el_blog_tituladas(string $pPattern):array{
    echo("cosas");
  }

	public function all_mis_entradas_en_el_blog_contienen(string $pPattern){
    echo("cosas");
  }
	
	public function remove_mis_entradas_en_el_blog_tituladas(string $pPattern){
    echo("cosas");
  }
	
	public function remove_mis_entradas_en_el_blog_contienen(string $pPattern){
    echo("cosas");
  }
	
	public function nueva_entrada_en_blog(string $pTitulo, string $pDescripcion, string $pContenido){
    echo("cosas");
  }
	
}