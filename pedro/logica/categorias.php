<?php
/*Libreria de funciones para manipular las categorias
Nota: esta técnica es muy usada en la programacion estructurada (No es Orientada a Objetos)
@author Walter Arias - walarias@misena.edu.co
@copyright Open source con fines didácticos
@versión 0.1 2019
*/
include('conectar.php');
error_reporting(E_ERROR |  E_PARSE);

//Esta funcion hace la consulta de las categorias en la base de datos,
//Retorna el resultado de la consulta (Query) en formato Array
function Consultar_Categorias(){
    global $conexion;   //utiliza la conexion
	try {       
        $sql = "SELECT * FROM Categoria";   
        $query = $conexion->prepare($sql);    
        $query->execute();
        return $query->fetchAll();	    
	  } catch (PDOException $e) {
	   echo "¡Error en la consulta: " . $e->getMessage() . "<br/>";
	   
    }
}
//Esta funcion hace la insercion de las categorias en la base de datos,
//Recibe 2 parametros con los datos del formulario, valida y sanitiza
// y luego inserta en la base de datos.
function Insertar_Categorias($id,$descripcion){
    $id = $_POST['id'];
	$descripcion = $_POST['descripcion'];

    //Validamos y Sanitizamos
    	try {
	    $sql = "INSERT INTO categoria(idcategoria, descripcion) VALUES(:id, :descripcion)";  //
	    $query = $conexion->prepare($sql);        
	    $query->bindparam(':id', $id);
	    $query->bindparam(':descripcion', $descripcion);
	    $query->execute();

	    echo "<h2 style ='color: blue;'>INSERCION EXITOSA!</h2>";

	    echo "<a href='../index.php'> Regresa</a> ";
	  } catch (PDOException $e) {
	   echo "¡Error en la insercion: " . $e->getMessage() . "<br/>";
	   
	}
}

function Borrar_Categorias($id,$descripcion){
    $id = $_POST['id'];
	$descripcion = $_POST['descripcion'];

    //Validamos y Sanitizamos
    	try {
	    $sql = "INSERT INTO categoria(idcategoria, descripcion) VALUES(:id, :descripcion)";  //
	    $query = $conexion->prepare($sql);        
	    $query->bindparam(':id', $id);
	    $query->bindparam(':descripcion', $descripcion);
	    $query->execute();

	    echo "<h2 style ='color: blue;'>INSERCION EXITOSA!</h2>";

	    echo "<a href='../index.php'> Regresa</a> ";
	  } catch (PDOException $e) {
	   echo "¡Error en la insercion: " . $e->getMessage() . "<br/>";
	   
	}
}
function Actualizar_Categorias($id,$descripcion){
    $id = $_POST['id'];
	$descripcion = $_POST['descripcion'];

    //Validamos y Sanitizamos
    	try {
	    $sql = "INSERT INTO categoria(idcategoria, descripcion) VALUES(:id, :descripcion)";  //
	    $query = $conexion->prepare($sql);        
	    $query->bindparam(':id', $id);
	    $query->bindparam(':descripcion', $descripcion);
	    $query->execute();

	    echo "<h2 style ='color: blue;'>INSERCION EXITOSA!</h2>";

	    echo "<a href='../index.php'> Regresa</a> ";
	  } catch (PDOException $e) {
	   echo "¡Error en la insercion: " . $e->getMessage() . "<br/>";
	   
	}
}
function Buscar_Categorias($id,$descripcion){
    $id = $_POST['id'];
	$descripcion = $_POST['descripcion'];

    //Validamos y Sanitizamos
    	try {
	    $sql = "INSERT INTO categoria(idcategoria, descripcion) VALUES(:id, :descripcion)";  //
	    $query = $conexion->prepare($sql);        
	    $query->bindparam(':id', $id);
	    $query->bindparam(':descripcion', $descripcion);
	    $query->execute();

	    echo "<h2 style ='color: blue;'>INSERCION EXITOSA!</h2>";

	    echo "<a href='../index.php'> Regresa</a> ";
	  } catch (PDOException $e) {
	   echo "¡Error en la insercion: " . $e->getMessage() . "<br/>";
	   
	}
}



?>