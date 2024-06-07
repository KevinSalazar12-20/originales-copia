<?php    	
	include('conexion.php');
	error_reporting(E_ERROR |  E_PARSE);

//  ----Validacion y Sanitizacion ---------------------------------------------------

	if(isset($_POST['id'])&&!empty($_POST['id'])){
		$id= filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
	}else{
		echo "el id enviado es invalido !"."<br>";
	}
	if(isset($_POST['propi'])&&!empty($_POST['propi'])){
		$propi= filter_var(trim($_POST['propi']), FILTER_SANITIZE_STRING);
	}else{
		echo "el propietario no coincide !"."<br>";
	}
	if(isset($_POST['marca'])&&!empty($_POST['marca'])){
		$marca= filter_var(trim($_POST['marca']), FILTER_SANITIZE_STRING);
	}else{
		echo "la marca es invalida !"."<br>";
	}
	if(isset($_POST['referencia'])&&!empty($_POST['referencia'])){
		$referencia= filter_var(trim($_POST['referencia']), FILTER_SANITIZE_STRING);
	}else{
		echo "la referencia es invalido !"."<br>";
	}
	if(isset($_POST['dispositivo'])&&!empty($_POST['dispositivo'])){
		$dispositivo= filter_var(trim($_POST['dispositivo']));
	}else{
		echo "dispositivo es invalido !"."<br>";
	}

//-----------------------------------------------------------------------------------------
	try {
	    $sql = "UPDATE bien SET  propi = :propi, Marca = :marca, Referencia = :referencia, Dispositivo = :dispositivo  WHERE IdBien = :id" ;  //
	    $query = $conectar->prepare($sql);        
		$query->bindparam(':id', $id);
		$query->bindparam(':propi', $propi);
	    $query->bindparam(':marca', $marca);
	    $query->bindparam(':referencia', $referencia);
	    $query->bindparam(':dispositivo', $dispositivo);
	    $query->execute();
	    echo "<h2>ACTUALIZACION EXITOSA!</h2>";
	    echo "<a href=../INDEX.php> Regresa</a> ";
	  } catch (PDOException $e) {
	   echo "¡Error en la Actualizacion: " . $e->getMessage() . "<br/>";
	   
	}
?>