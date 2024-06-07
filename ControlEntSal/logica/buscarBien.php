<?php  
include('conexion.php');

// validar datos enviados
if(isset($_POST['Cc']) &&!empty($_POST['Cc'])){
	$Cc = filter_var(trim($_POST['Cc']), FILTER_SANITIZE_STRING);
}else{
	echo 'ERROR CON EL DOCUMENTO DE IDENTIFICACION<br>';
}

if(isset($_POST['serial']) &&! empty($_POST['serial'])){
	$serial = filter_var(trim($_POST['serial']), FILTER_SANITIZE_STRING);
}else{
	echo "ERROR CON EL SERIAL<br>";
}


/*BUSCO EN LA TABLA BIEN*/
try{

	$sql = "select IdBien from bien where propi = :Cc  and Referencia = :serial ";
	$query = $conectar->prepare($sql);
	$query->bindparam(':Cc', $Cc);
	$query->bindparam(':serial', $serial); 	
	$query->execute();
	$dato = $query->fetchAll();
	$numeroColumn = count($dato);

	if ($numeroColumn > 0) {
		$id = $dato[0][0];
		echo "BIEN ENCONTRADO<br><br>";
		echo "<a href=../administrarBien.php?id=$id> EDITAR</a> ";
	}else{
		echo "BIEN NO ENCONTRADO<br><br>";
		echo "<a href='../buscarBienAdministrar.php'>REGRESAR</a> ";
	}

}catch(PDOExcepcion $e){
	echo "ERROR". $e->getMessage()."<br>";
}


?>