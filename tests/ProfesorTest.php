<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

# https://stackoverflow.com/a/39455129/1820838
require __DIR__ . "/../src/FactoryProfesor.php";

final class ProfesorTest extends TestCase {
	public function testFabricaUnProfesor(): void {
		$this->assertNull(FactoryProfesor::getInstance()->fabrica());
	}
}