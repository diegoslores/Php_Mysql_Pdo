## Instrucciones sobre cómo documentar

La primera consideración es que NO debes editar ningún fichero de README.md para tu propia documentación. Si quieres corregir algún error ortográfico o de cualquier tipo o incluso una sugerencia, realízalo a través de un pull request.

Para documentar tu código debes contemplar los siguientes aspectos:

### Mecanismo de versionado

Cuando tengas un revisión de tu código que consideres estable, etiquétala de la siguiente manera:

> `v1.x-usuario`

* Donde `x`, es un número que incrementarás empezando por el 0, cuando realices cambios en tu programa.
* Donde `usuario`, es el indentificador que se te ha proporcicionado en clase.

**Importante:** Sé estricto y preciso formando la cadena de la versión. Utiliza caracteres [ASCII](https://es.wikipedia.org/wiki/ASCII) (sin acentos). Pon tu nombre con la primera letra en minúscula siguiendo el resto con el estilo [lowerCamelCase](https://es.wikipedia.org/wiki/CamelCase). Recuerda que esto es importante porque pueden existir mecanismos de automatización de revisión de ejercicios.

```Shell
# Ejemplo
git tag v1.0-juanCarlosDeBorbon
```

## Documentación inline

**Es necesario documentar todas las clases y todos los métodos de interfaz** (los públicos). Existen herramientas que, accediendo al código fuente, pueden extraer su documentación presentándola en un formato *más amigable*. Ejemplo de ellas son:

* [Doxygen](http://www.doxygen.nl/)
* [phpDocumentator](http://phpdoc.org/)
* [Sami](https://github.com/FriendsOfPHP/Sami)
* [ApiGen](http://www.apigen.org/)
* [phpDox](http://phpdox.de/)


Utilizarlas queda fuera del alcance del ejercicio pero sí que la documentación presentada en código pueda ser asimilada por ellas. Revisa la documentación de [phpDocumentator](https://docs.phpdoc.org) para saber cómo debes documentar cláses y métodos.

## Documenta los pasos seguidos

Documenta los pasos seguidos en el fichero `doc/Work.md`. No es necesario que realices este trabajo para la entrega si no quieres, pero sí es recomendable para ti mismo. Si recuperas este trabajo después de algún tiempo puede que agradezcas algunas instrucciones dadas por ti mismo o que documentes algún problema que te ha bloqueado o puede que te bloquee en un futuro.

**Muy importante:** Si utilizas imágenes, éstas deben ser subidas a la carpeta `doc/img/` y **trata de que pesen lo menos posible** (unos pocos Kb). La calidad no es importante siempre que se lea correctamente la documentación que contiene. Los formatos, al menos, deberán ser alguno de los siguientes: `pdf`, `png`, `jpeg`