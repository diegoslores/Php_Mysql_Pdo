<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

# https://stackoverflow.com/a/39455129/1820838
require __DIR__ . "/../src/FactoryProfesor.php";
require 'vendor/autoload.php';

final class ProfesorTest extends TestCase {
	
	private static $log;
	
	public static function setUpBeforeClass(){
		/*Logger::configure('configs/log4php-config.xml');
		self::$log = Logger::getLogger("test");*/
	}
	
	public function test_Fabrica_un_profesor(): void {
		$this->assertIsObject(FactoryProfesor::getInstance()->fabrica());
	}
	
	public function test_Get_all_alumnos_mayores_de_edad(): void {
		$profesor = FactoryProfesor::getInstance()->fabrica();
		$result = $profesor->get_all_alumnos_mayores_de_edad();
		
		$this->assertIsIterable($result);
		$this->assertEquals(614, count($result));
		foreach($result as $unAlumno){
			$this->assertInstanceOf(Alumno::class, $unAlumno);
			if($unAlumno->getEmail()=="quitzon.billy@example.com"){
				$this->fail('Este alumno no debería figurar');
			}
		}
	}
	
	public function test_Get_all_alumnos_menores_de_edad(): void {
		$profesor = FactoryProfesor::getInstance()->fabrica();
		$result = $profesor->get_all_alumnos_menores_de_edad();
		
		$this->assertIsIterable($result);
		$this->assertEquals(386, count($result));
		foreach($result as $unAlumno){
			$this->assertInstanceOf(Alumno::class, $unAlumno);
			if($unAlumno->getEmail()=="antonina.ankunding@example.com"){
				$this->fail('Este alumno no debería figurar');
			}
		}
	}
	
	public function test_Get_all_alumnos_con_email_incorrecto(): void {
		$profesor = FactoryProfesor::getInstance()->fabrica();
		$result = $profesor->get_all_alumnos_con_email_incorrecto();
		$this->assertIsIterable($result);
		$this->assertEquals(5, count($result));
		
		foreach($result as $unAlumno){
			$this->assertInstanceOf(Alumno::class, $unAlumno);
			self::$log->info("El siguiente email es incorrecto: ".$unAlumno->getEmail());
		}
	}
	
	public function test_Alumnos_no_escribieron_en_blog(): void {
		$profesor = FactoryProfesor::getInstance()->fabrica();
		$result = $profesor->alumnos_no_escribieron_en_blog();
		foreach($result as $unAlumno){
			$this->assertInstanceOf(Alumno::class, $unAlumno);
			self::$log->info($unAlumno->getFirstName()." ".$unAlumno->getLastName()." no escribió en el blog.");
		}
		$this->assertEquals(0, count($result));
	}
	
	public function test_Get_all_alumnos_con_email_de_dominio(): void {
		$profesor = FactoryProfesor::getInstance()->fabrica();
		$dominio1 = "example.net";
		$result = $profesor->get_all_alumnos_con_email_de_dominio($dominio1);
		foreach($result as $unAlumno){
			$this->assertInstanceOf(Alumno::class, $unAlumno);
			self::$log->info($unAlumno->getFirstName()." ".$unAlumno->getLastName()." tiene email con dominio $dominio1.");
		}
		$this->assertEquals(327, count($result));
	}
	
	public function test_Get_alumno_by_id(): void{
		$profesor = FactoryProfesor::getInstance()->fabrica();
		$alumno = $profesor->get_alumno_by_id(626);
		$this->assertInstanceOf(Alumno::class, $alumno);
		$this->assertEquals($alumno->getEmail(), "jpouros@example.org");
	}
	
	public function test_Get_alumno_by_email(): void{
		$profesor = FactoryProfesor::getInstance()->fabrica();
		$alumno = $profesor->get_alumno_by_email("jpouros@example.org");
		$this->assertInstanceOf(Alumno::class, $alumno);
		$this->assertEquals($alumno->getId(), 626);
	}
}