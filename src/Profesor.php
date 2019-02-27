<?php

/**
 * Un profesor agregará a un conjunto de alumnos y responderá sobre su gestión
 * @authors Enrique Agrasar
 */
interface Profesor {
	/** @return array<Alumno> Retorna un array con todos los alumnos mayores de edad. */
	public function get_all_alumnos_mayores_de_edad();
	/** @return array<Alumno> Retorna un array con todos los alumnos menores de edad. */
	public function get_all_alumnos_menores_de_edad();
	/** @return array<Alumno> Retorna un array con todos los alumnos que tienen mal especificado (no válido) su email. */
	public function get_all_alumnos_con_email_incorrecto();
	/** @return array<Alumno> Retorna un array con todos los alumnos que todavía no escribieron en el blog de clase. */
	public function alumnos_no_escribieron_en_blog():array;
	
	/** @param $pDominio Un dominio concreto (p.e. 'gmail.com') 
	* @return array<Alumno> Retorna un array con todos los alumnos cuyo email es de un dominio concreto. */
	public function get_all_alumnos_con_email_de_dominio(string $pDominio);
	
}

