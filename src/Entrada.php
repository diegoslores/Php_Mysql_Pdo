<?php

/**
 * Un alumno representa a una persona que escribe entradas en un blog de clase
 * @authors Enrique Agrasar
 */
interface Entrada{
	
	/** Es un identificador que identifica unívocamente a la entrada*/
	public function getId():int;
	
	/** El autor de la entrada */
	public function getAlumno():Alumno;
	/** El título de la entrada */
	public function getTitulo():string;
	/** El cotenido de la entrada */
	public function getContent():string;
	/** El estracto que resume de la entrada */
	public function getDescripction():string;
	/** La fecha de la entrada */
	public function getDate();
}