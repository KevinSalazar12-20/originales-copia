<?php    	
   	include('conectar.php');
    error_reporting(E_ERROR |  E_PARSE);

function Consultar_Categorias(){
    global $conexion;   //utiliza la conexion
	try {       
        $sql = "SELECT * FROM Categoria";   
        $query = $conexion->prepare($sql);    
        $query->execute();
        return $query->fetchAll();	    //devuelve el resultado de la consulta en formato arreglo
	  } catch (PDOException $e) {
	   echo "¡Error en la consulta: " . $e->getMessage() . "<br/>";
	   
    }
}




?>