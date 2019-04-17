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
  public function __construct($object = null){
    if ($object != null) {
    $this->id = $object->id;
    $this->firstName = $object->first_name;
    $this->lastName = $object->last_name;
    $this->email = $object->email;
    $this->birthdate = $object->birthdate;
    $this->dischargeDate = $object->added;
    }else{
    $this->id = 1;
    $this->firstName ="dd";
    $this->lastName = "dd";
    $this->email = "dd";
    $this->birthdate = "dd";
    $this->dischargeDate = "dd";
    }
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
    return new AlumnoI();
  }
	
	public static function get_alumno_by_email(string $pEmail){
    echo("cosas");
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
  
  private function getBaseDatos(){
    $conexion = new mysqli("127.0.0.1" , "dwcs" , "abc123." , "dwcs_mysqli_dbo");
    return $conexion;
  }

}