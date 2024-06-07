
<?php    	
	include('conectar.php');
	error_reporting(E_ERROR |  E_PARSE);

//  ----Validacion y Sanitizacion ---------------------------------------------------

	if(isset($_POST['id'])&&!empty($_POST['id'])){
		$id= filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
	}else{
		echo "el id enviado es invalido !"."<br>";
	}
	if(isset($_POST['descripcion'])&&!empty($_POST['descripcion'])){
		$descripcion= filter_var(trim($_POST['descripcion']), FILTER_SANITIZE_STRING);
	}else{
		echo "la descripcion es invalida !"."<br>";
	}

//-----------------------------------------------------------------------------------------
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
?>