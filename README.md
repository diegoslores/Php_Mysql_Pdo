# README

## Para qué es este repo?

Este repo plantea un ejercicio sencillo para realizar leer o manipular datos sobre bases de datos programando en PHP.

Con conocimientos sobre Bases de Datos relacionales, pretende desde el enfoque de POO, mantener una base de datos de alumnos que realizan entradas en un blog de una clase. (Ejercicio didáctico).

Podrás documentarte en el [Manual de MySQLi](http://php.net/manual/es/book.mysqli.php).

## Concreciones sobre especificaciones

1. Debes implementar tu solución en la carpeta `/src`. No modifiques ningún código fuente fuera de esa carpeta. Tampoco modifiques los ficheros: `Alumno.php` y `Profesor.php`.
2. Debes crear una clase que implemente la interfaz `Alumno` , de acorde a la documentación ya facilitada en la propia interface.
3. Debes crear una clase que implemente la interfaz `Profesor`, de acorde a la documentación ya facilitada en la propia interface.
4. Debes implementar en la clase `FactoryProfesor`, el método todo `fabricar`, creando una instancia que satisfaga la interface `Profesor` y retornándola en dicho método. 
5. Toda la información consultada debe proceder de la base de datos. Ver [la sección de crear y precargar la base de datos](#Crear-y-Precargar-la-base-de-Datos) para más información.

## Pre-requisitos

Como requisitos previos se asumen nociones básicas de programación y conocimientos previos de bases de datos y el lenguaje de consulta SQL.

* Selección de herramientas de programación
* Declaración de variables. Tipo y ámbito.
* Uso de funciones. Principio de Reutilización del Código
* Estructuras básicas de datos
* Estructuras básicas de control
* Bucles
* Entrada y salida de datos
* Operadores Aritmético-lógicos
* Librerías

## Lo que se pretende aprender de este ejercicio

* Mecanismos básicos de acceso a datos
* mySQLi
* PDO
* Patrones arquitectónicos
* Validación y correctitud de datos de entrada
* Librerías y dependencias
* Composer

## Antes de ponerte a trabajar...

### Haz un fork del repositorio original

Haz un fork del repositorio original y configúralo de forma privada dando permiso de escritura al profesor (la actividad propuesta es individual ;) **Asegúrate que NO le cambias el nombre al repo al hacer el fork** (es necesario para que los mecanimos de automatización del curso funcionen correctamente).
Habilita las issues e indica que es un proyecto Php.


### Clona el repositorio

Clona el repositorio en la máquina o máquinas con las que vas a trabajar de la siguiente manera:

```
git clone <url de tu fork>
```

### Asegúrate de tener composer y realiza un update

Debes asegurarte que tienes instalado composer. Instálado conforme a las intrucciones que indican en la [documentación oficial (Getting Started)](https://getcomposer.org/doc/00-intro.md).

Asegúrate que la versión de composer instalada es igual o superior a esta:

```Shell
$ composer --version
Composer version 1.7.3 2018-11-01 10:05:06
```

Configura y obtiene las dependencias del proyecto de la siguiente forma (situándote en la raiz de tu repo):

```Shell
composer update
```

Después de la ejecución de esta instrucción debes tener en la raíz de tu repo una carpeta `vendor`. Asegúrate de nunca depositar en tu repo esta carpeta (está ya incluída en `.gitignore` para que sea ignorada por git)

### Crear y Precargar la base de Datos

Debes instalar un server de mysql. Se verificó el funcionamiento de este script utilizando la versión de MySQL Server: `8.0.15`

Para crear la base de datos ejecuta la siguiente sentencia, estando situado en la raiz de tu repo (se asume que el usuario `root` no tiene establecido ningún password, utiliza `-p` en caso contrario):

```Shell
mysql -uroot < doc/resources/script-precarga-db.sql
```

Este script se puede utilizar una y otra vez (eliminará todos los datos para volverlos insertar). Creará una base de datos, creará un usuario y dará todos los permisos a éste para operar con dicha db. Los datos serán:

```Shell
dwcs_mysqli_dbo # Nombre de la db
dwcs 			# Nombre del usuario
abc123.			# Password
```

### Crea tu rama (personal) de trabajo

Crea tu propia rama de trabajo! Crea una nueva rama a partir de master que se llame como el nombre de tu usuario en el curso. Te recuerdo cómo:

```
git checkout -b <usuario>
```

La evolución de tu solución final deberá estar apuntada por esta rama. Puedes utilizar todas las ramas que quieras, pero **no trabajes en la master** y asegúrate, si tienes otras ramas que forman parte de tu solución, de combinarlas con tu rama con el nombre de tu usuario.

## Documenta tu trabajo

El repo debe contener una carpeta nombrada como `doc`. [Sigue las instrucciones](doc/README.md) de cómo documentar.

## Cuándo termines tu trabajo... o eso crees...

### Ejecuta los tests automatizados para verificar la solución correcta

Próximamente se facilitarán los test automatizados.

Ejecutarás los test de la siguiente manera situándote en la raíz de tu repo:

```Shell
# Si quieres ejecutar todos los tests
./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests/

# Si quieres ejecutar un test concreto
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/EmailTest.php
```

### Etiqueta tu versión

Cuando tengas un revisión de tu código que consideres estable, etiquétala de la forma que te indique el [mecanismo de versionado](doc/README.md). Modifica tambien el [changelog](doc/changelog.md) indicando las novedades de la versión.
Puedes hacer etiquetado de tu último commit de la siguiente manera:

```
# Si quieres hacer una etiqueta ligera (solo nombrar un commit
git tag <etiqueta>

# Si quieres hacer una etiqueta que contenga más información
git tag -a <etiqueta> -m 'El mensaje'
```

Si quieres poner una etiqueta a un commit anterior, pon su checksum al final de las instrucciones anteriores.

Recuerda enviar tus tags a tus repos remotos de la siguiente manera:

```
git push <remoto> <tag>
```

Consulta esta [fuente](https://git-scm.com/book/es/v2/Fundamentos-de-Git-Etiquetado) para más detalles.

## Estrategia de ramificación

Rama					| Uso
------------ 			| -------------
`master`	 			| Evolución del enunciado del ejercicio
`tests`					| Evolución de los tests
`remote\usuario` 		| Evolución de la solución de cada alumno
`solucionX`				| Rama que representa una solución (puede derivar de master u otra rama)

### Changelog de enunciado:

Se irán etiquetando enunciados consolidados y entregados a alumnos. Se dará una explicación general de cada cambio :

Tag				| Descripción
------------ 	| -------------
`enum-v1`		| Enunciado inicial.

### Snapshot actual del enunciado:

```Shell
.
├── README.md
├── composer.json
├── composer.lock
├── doc
│   ├── README.md
│   ├── Work.md
│   ├── changelog.md
│   └── resources
│       └── script-precarga-db.sql
├── src
│   ├── Alumno.php
│   ├── FactoryProfesor.php
│   └── Profesor.php
└── tests
    ├── AlumnoTest.php
    └── ProfesorTest.php
```

## Contribution guidelines

* Writing tests
* Code review
* Other guidelines

## Who do I talk to?

* Repo owner or admin
* Other community or team contact
