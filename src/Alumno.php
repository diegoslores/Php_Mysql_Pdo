<?php

/**
 * Un alumno representa a una persona que escribe entradas en un blog de clase
 * @authors Enrique Agrasar
 */
interface Alumno{
	
	/** Es un identificador que lo identifica unívocamente a otro alumno*/
	public function getId():int;
	/** Nombre del alumno*/
	public function getFirstName():string;
	/** Primer apellido del alumno*/
	public function getLastName():string;
	/** Dirección de email del alumno */
	public function getEmail();
	/** Actualización del email del alumno. Debe ser válido */
	public function setEmail(string $pEmail);
	/** Fecha de nacimiento del alumno */
	public function getBirthdate();
	/** Fecha de alta del alumno en el sistema */
	public function getDischargeDate():DateTime;
	
	/** @param $pId Un id de alumno 
	* @return Alumno Retorna el alumno coincidente con ese criterio de búsqueda */
	public static function get_alumno_by_id($pId);
	
	/** @param $pEmail Un email de alumno 
	* @return Alumno Retorna el alumno coincidente con ese criterio de búsqueda */
	public static function get_alumno_by_email(string $pEmail);
	
	/** @return boolval ¿Tiene entradas el alumno en el blog */
	public function tengo_entradas_en_el_blog(): bool;
	/** @return boolval ¿Eres mayor de edad */
	public function soy_mayor_de_edad(): bool;
	/** @return array<Entrada> Retorna un array con todas las entradas del alumno en el Blog de clase */
	public function all_mis_entradas_en_el_blog() : array;
	/** @return array<Entrada> Retorna un array con todas las entradas coincidentes (mediante patrón) con títulos de entradas del alumno en el Blog de clase */
	public function all_mis_entradas_en_el_blog_tituladas(string $pPattern):array;
	/** @return array<Entrada> Retorna un array con todas las entradas coincidentes (mediante patrón) con títulos o contenido de entradas del alumno en el Blog de clase */
	public function all_mis_entradas_en_el_blog_contienen(string $pPattern);
	
	/** Borra todas las entradas coincidentes (mediante patrón) con títulos de entradas del alumno en el Blog de clase
	* @return int Número de entradas eliminadas */
	public function remove_mis_entradas_en_el_blog_tituladas(string $pPattern);
	
	/** Borra todas las entradas coincidentes (mediante patrón) con títulos o contenido  de entradas del alumno en el Blog de clase
	* @return int Número de entradas eliminadas */
	public function remove_mis_entradas_en_el_blog_contienen(string $pPattern);
	
	/** Introduce una nueva entrada en el Blog de clase del alumno */
	public function nueva_entrada_en_blog(string $pTitulo, string $pDescripcion, string $pContenido);
	
}
