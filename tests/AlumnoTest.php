<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AlumnoTest extends TestCase {
	
	private static $log;
	private static $profesor;
	
	public static function setUpBeforeClass(){
		Logger::configure('config.xml');
		self::$log = Logger::getLogger("test");
		self::$profesor = FactoryProfesor::getInstance()->fabrica();
	}
	
	public function test_tengo_entradas_en_el_blog(): void{
		$alumno = self::$profesor->get_alumno_by_id(626);
		$this->assertTrue($alumno->tengo_entradas_en_el_blog());
	}
	
	public function test_soy_mayor_de_edad(): void{
		$alumno = self::$profesor->get_alumno_by_id(626);
		$this->assertTrue($alumno->soy_mayor_de_edad());
	}
	
	public function test_all_mis_entradas_en_el_blog(): void{
		$alumno = self::$profesor->get_alumno_by_id(626);
		$entradas = $alumno->all_mis_entradas_en_el_blog();
		foreach($entradas as $unaEntrada){
			$this->assertInstanceOf(Entrada::class, $unaEntrada);
		}
		$this->assertEquals(2, count($entradas));
	}
	
	public function test_all_mis_entradas_en_el_blog_tituladas(): void{
		//TODO:
	}
	
	public function test_all_mis_entradas_en_el_blog_contienen(): void{
		//TODO:
	}
	
	public function test_remove_mis_entradas_en_el_blog_tituladas(): void{
		//TODO:
	}
	
	public function test_remove_mis_entradas_en_el_blog_contienen(): void{
		//TODO:
	}

	public function test_nueva_entrada_en_blog(): void{
		//TODO:
	}
	
	
}