<?php
require 'conexion.php';

$busca="";
// validar datos enviados
if(isset($_POST['busca']) || !empty($_POST['busca'])){
	$busca = filter_var(trim($_POST['busca']), FILTER_SANITIZE_STRING);
}else{
	echo 'ERROR CON EL NOMBRE DE USUARIO<br>';
}

function FuncbusquedaU($busca){
	/*------------------------CONSULTO-----------------*/
	global $conectar;
	try{
		
		$sql = "SELECT * FROM  usuarios where Nombre = :busca ";
		$query = $conectar->prepare($sql);
		$query->bindparam(':busca', $busca);
		$query->execute();
		$tabla = $query->fetchAll();
		//cantida de registros
		$num = count($tabla);

		if ($num > 0) {
			return $tabla;
		}else{
			echo "NO SE PUDO GENERAR LA BUSQUEDA<br><br>";
		}

	}catch(PDOException $e){
		echo "ERROR AL CONSULTAR => ".$e->getMessage()."<br>";
	}

}




function Funcbusquedab($busca){
	/*------------------------CONSULTO-----------------*/
	global $conectar;
	try{
		
		$sql = "SELECT * FROM  bien where IdBien = :busca ";
		$query = $conectar->prepare($sql);
		$query->bindparam(':busca', $busca);
		$query->execute();
		$tabla = $query->fetchAll();
		//cantida de registros
		$num = count($tabla);

		if ($num > 0) {
			return $tabla;
		}else{
			echo "NO SE PUDO GENERAR LA BUSQUEDA<br><br>";
		}

	}catch(PDOException $e){
		echo "ERROR AL CONSULTAR => ".$e->getMessage()."<br>";
	}

}

function FuncbusquedaA($busca){
	/*------------------------CONSULTO-----------------*/
	global $conectar;
	try{
		
		$sql = "SELECT * FROM  usuario_sena where Nombre = :busca ";
		$query = $conectar->prepare($sql);
		$query->bindparam(':busca', $busca);
		$query->execute();
		$tabla = $query->fetchAll();
		//cantida de registros
		$num = count($tabla);

		if ($num > 0) {
			return $tabla;
		}else{
			echo "NO SE PUDO GENERAR LA BUSQUEDA<br><br>";
		}

	}catch(PDOException $e){
		echo "ERROR AL CONSULTAR => ".$e->getMessage()."<br>";
	}

}

?>




