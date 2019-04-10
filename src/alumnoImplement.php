<?php
require_once("Alumno.php");

Class Alumno extends Alumno{

  private $id;
  private $firstName;
  private $lastName;  
  private $email;
  private $birthdate;
  private $dischargeDate;
	
	public function getId():int{
    echo("cosas");
  }

  public function getFirstName():string{
    echo("cosas");
  }

  public function getLastName():string{
    echo("cosas");
  }

  public function getEmail(){
    echo("cosas");
  }

	public function setEmail(string $pEmail){
    echo("cosas");
  }
	
	public function getBirthdate(){
    echo("cosas");
  }

	public function getDischargeDate():DateTime{
    echo("cosas");
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