<?php  
include('conexion.php');

// validar datos enviados
if(isset($_POST['usuario']) &&!empty($_POST['usuario'])){
	$usuario = filter_var(trim($_POST['usuario']), FILTER_SANITIZE_STRING);
}else{
	echo 'ERROR <br>';
}

if(isset($_POST['pass']) &&! empty($_POST['pass'])){
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
}else{
	echo "ERROR CON EL SERIAL<br>";
}


/*BUSCO EN LA TABLA BIEN*/
try{

	$sql = "select Id from usuarios where Nombre_Usuario = :usuario and Pass = :pass ";
	$query = $conectar->prepare($sql);
	$query->bindparam(':usuario', $usuario);
	$query->bindparam(':pass', $pass); 	
	$query->execute();
	$dato = $query->fetchAll();
	$numeroColumn = count($dato);

	if ($numeroColumn > 0) {
		$id = $dato[0][0];
		echo "BIENVENIDO <br><br>";
		echo "<a href=../INDEX.php?id=$id>INICIO</a> ";
	}else{
		echo "ACCESO DENEGADO<br><br>";
		echo "<a href='../LOGIN.php'>VOLVER</a> ";
	}

}catch(PDOExcepcion $e){
	echo "ERROR". $e->getMessage()."<br>";
}


?>