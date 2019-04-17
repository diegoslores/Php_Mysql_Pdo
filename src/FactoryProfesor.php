<?php
require_once("profesorImplement.php");
/**
 * Singleton class and factory method
 *
 */
final class FactoryProfesor {
	/**
     * @var Singleton
     */
    private static $instance;
	
     /**
     * gets the instance via lazy initialization (created on first usage)
     */
    public static function getInstance(): FactoryProfesor
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     */
    private function __construct(){}

    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone(){}

    /**
     * prevent from being unserialized (which would create a second instance of it)
     */
    private function __wakeup(){}
		
	/**
     * Construye una instancia de tipo Profesor
	 * @return Profesor Una instancia de profesor cualquiera
     */
	public function fabrica(): Profesor {
		return new ProfesorI();
	}
}