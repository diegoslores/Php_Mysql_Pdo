<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AlumnoTest extends TestCase {
	
	//private static $log;
	private static $profesor;
	
	public static function setUpBeforeClass(){
	/*	Logger::configure('configs/log4php-config.xml');
		self::$log = Logger::getLogger("tests");
		self::$log->info("Comienza el test ". get_called_class());*/
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
		$alumno = self::$profesor->get_alumno_by_id(406);
		$entradas = $alumno->all_mis_entradas_en_el_blog_tituladas("nihil");
		foreach($entradas as $unaEntrada){
			$this->assertInstanceOf(Entrada::class, $unaEntrada);
		}
		$this->assertEquals(2, count($entradas));
	}
	
	public function test_all_mis_entradas_en_el_blog_contienen(): void{
		$alumno = self::$profesor->get_alumno_by_id(406);
		$entradas = $alumno->all_mis_entradas_en_el_blog_contienen("architecto");
		foreach($entradas as $unaEntrada){
			$this->assertInstanceOf(Entrada::class, $unaEntrada);
		}
		$this->assertEquals(1, count($entradas));
	}
	
	public function test_remove_mis_entradas_en_el_blog_tituladas(): void{
		$alumno = self::$profesor->get_alumno_by_id(406);
		$entradas = $alumno->all_mis_entradas_en_el_blog();
		$this->assertEquals(3, count($entradas));
		$alumno->remove_mis_entradas_en_el_blog_tituladas("voluptatibus");
		$entradas = $alumno->all_mis_entradas_en_el_blog();
		$this->assertEquals(2, count($entradas));
		
	}
	
	public function test_remove_mis_entradas_en_el_blog_contienen(): void{
		$alumno = self::$profesor->get_alumno_by_id(405);
		$entradas = $alumno->all_mis_entradas_en_el_blog();
		$this->assertEquals(3, count($entradas));
		$alumno->remove_mis_entradas_en_el_blog_contienen("provident");
		$entradas = $alumno->all_mis_entradas_en_el_blog();
		$this->assertEquals(1, count($entradas));
	}

	public function test_nueva_entrada_en_blog(): void{
		$alumno = self::$profesor->get_alumno_by_id(400);
		$titulo = "Pepe madruga";
		$resumen = "Un día de Pepe";
		$contenido = "Pepe es un pollo muy peculiar. Todos los días debe madrugar, si al cole quiere llegar";
		$alumno->nueva_entrada_en_blog($titulo,$resumen,$contenido);
		$entradas = $alumno->all_mis_entradas_en_el_blog_tituladas($titulo);
		$this->assertEquals(1, count($entradas));
		$nuevaEntrada = reset($entradas);
		$this->assertEquals($titulo, $nuevaEntrada->getTitulo());
		$this->assertEquals($resumen, $nuevaEntrada->getDescripction());
		$this->assertEquals($contenido, $nuevaEntrada->getContent());
		$this->assertNotNull($nuevaEntrada->getdate());
	}
	
	
}