<?php


try {
    $conectar = new PDO('mysql:host=localhost;dbname=crud_sena','root','');
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

  	} catch (PDOException $e) {
		   echo "¡Error en la conexion: " . $e->getMessage() . "<br/>";
		   
			                  }


?>
