<?php
include ('conexion.php');

$sql = "SELECT * FROM  usuarios where Nombre = :usuario  and Pass = :pass ";
$query = $conectar->prepare($sql);
$query->bindparam(':usuario', $usuario);
$query->bindparam(':pass', $pass);
$query->execute();
$cuenta = $query->fetchColumn();
		//cantida de registros
$num = count($cuenta);

if ($num > 0) {
	header("Location:INDEX.php");
}else{
	header ("Location:nada.php");
}

?>	
