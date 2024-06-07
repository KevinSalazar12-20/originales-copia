<?php
/*
Conexion a la base de datos
@author: Walter Arias
@version: 1 02-09-2019
*/ 


/*credenciales para la base de datos*/



define('BD_USER','root'); 
define('BD_CLAVE','');



/*Conexion a la BD*/

try {
    $conexion = new PDO('mysql:host=localhost;dbname=tiendapedro', BD_USER, BD_CLAVE);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

  	} catch (PDOException $e) {
		   echo "¡Error en la conexion: " . $e->getMessage() . "<br/>";
		   
			                  }


?>






