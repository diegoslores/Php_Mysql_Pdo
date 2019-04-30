<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AlumnoTest extends TestCase {
	
	private static $log;
	private static $profesor;
	
	public static function setUpBeforeClass(){
		Logger::configure('configs/log4php-config.xml');
		self::$log = Logger::getLogger("test");
		self::$log->info("Comienza el test ". get_called_class());
		self::$profesor = FactoryProfesor::getInstance()->fabrica();
	}
	
	public function test_get_alumno_by_id():array{
		$alumno626 = self::$profesor->get_alumno_by_id(626);
		$this->assertEquals($alumno626->getId(), 626);
		$this->assertEquals($alumno626->getFirstName(), "Glenda");
		$this->assertEquals($alumno626->getLastName(), "Swift");
		$this->assertEquals($alumno626->getEmail(), "jpouros@example.org");
		$this->assertEquals($alumno626->getBirthdate(), "1974-09-15");
		
		$alumno406 = self::$profesor->get_alumno_by_id(406);
		$this->assertEquals($alumno406->getId(), 406);
		$this->assertEquals($alumno406->getFirstName(), "Anastacio");
		$this->assertEquals($alumno406->getLastName(), "Feest");
		$this->assertEquals($alumno406->getEmail(), "malika80@example.net");
		$this->assertEquals($alumno406->getBirthdate(), "1972-06-02");
		
		$alumno405 = self::$profesor->get_alumno_by_id(405);
		$this->assertEquals($alumno405->getId(), 405);
		$this->assertEquals($alumno405->getFirstName(), "Autumn");
		$this->assertEquals($alumno405->getLastName(), "Anderson");
		$this->assertEquals($alumno405->getEmail(), "bartoletti.boris@example.com");
		$this->assertEquals($alumno405->getBirthdate(), "2012-01-26");
		
		$alumno400 = self::$profesor->get_alumno_by_id(400);
		$this->assertEquals($alumno400->getId(), 400);
		$this->assertEquals($alumno400->getFirstName(), "Frederick");
		$this->assertEquals($alumno400->getLastName(), "Strosin");
		$this->assertEquals($alumno400->getEmail(), "stan.torphy@example.net");
		$this->assertEquals($alumno400->getBirthdate(), "1974-01-28");
		
		return ["alumno626" => $alumno626, "alumno406" => $alumno406, "alumno405" => $alumno405, "alumno400" => $alumno400];
	}
	
	/**
     * @depends test_get_alumno_by_id
     */
	public function test_tengo_entradas_en_el_blog($alumnos): void{
		$alumno = $alumnos["alumno626"];
		$this->assertTrue($alumno->tengo_entradas_en_el_blog());
	}
	
	/**
     * @depends test_get_alumno_by_id
     */
	public function test_soy_mayor_de_edad($alumnos): void{
		$alumno = $alumnos["alumno626"];
		$this->assertTrue($alumno->soy_mayor_de_edad());
	}
	
	/**
     * @depends test_get_alumno_by_id
     */
	public function test_all_mis_entradas_en_el_blog($alumnos): void{
		$alumno = $alumnos["alumno626"];
		$entradas = $alumno->all_mis_entradas_en_el_blog();
		foreach($entradas as $unaEntrada){
			$this->assertInstanceOf(Entrada::class, $unaEntrada);
		}
		$this->assertEquals(2, count($entradas));
	}
	
	/**
     * @depends test_get_alumno_by_id
     */
	public function test_all_mis_entradas_en_el_blog_tituladas($alumnos): void{
		$alumno = $alumnos["alumno406"];
		$entradas = $alumno->all_mis_entradas_en_el_blog_tituladas("nihil");
		foreach($entradas as $unaEntrada){
			$this->assertInstanceOf(Entrada::class, $unaEntrada);
		}
		$this->assertEquals(2, count($entradas));
	}
	
	/**
     * @depends test_get_alumno_by_id
     */
	public function test_all_mis_entradas_en_el_blog_contienen($alumnos): void{
		$alumno = $alumnos["alumno406"];
		$entradas = $alumno->all_mis_entradas_en_el_blog_contienen("architecto");
		foreach($entradas as $unaEntrada){
			$this->assertInstanceOf(Entrada::class, $unaEntrada);
		}
		$this->assertEquals(1, count($entradas));
	}
	
	/**
     * @depends test_get_alumno_by_id
     */
	public function test_remove_mis_entradas_en_el_blog_tituladas($alumnos): void{
		$alumno = $alumnos["alumno406"];
		$entradas = $alumno->all_mis_entradas_en_el_blog();
		$this->assertEquals(3, count($entradas));
		$alumno->remove_mis_entradas_en_el_blog_tituladas("voluptatibus");
		$entradas = $alumno->all_mis_entradas_en_el_blog();
		$this->assertEquals(2, count($entradas));
		
	}
	
	/**
     * @depends test_get_alumno_by_id
     */
	public function test_remove_mis_entradas_en_el_blog_contienen($alumnos): void{
		$alumno = $alumnos["alumno405"];
		$entradas = $alumno->all_mis_entradas_en_el_blog();
		$this->assertEquals(3, count($entradas));
		$alumno->remove_mis_entradas_en_el_blog_contienen("provident");
		$entradas = $alumno->all_mis_entradas_en_el_blog();
		$this->assertEquals(1, count($entradas));
	}

	/**
	* @depends test_get_alumno_by_id
	*/
	public function test_nueva_entrada_en_blog($alumnos): void{
		$alumno = $alumnos["alumno400"];
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