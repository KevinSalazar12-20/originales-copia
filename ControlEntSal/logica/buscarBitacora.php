<?php 
include("conexion.php");

if(isset($_POST["fecha"]) &&! empty($_POST["fecha"])){
	$fecha = filter_var(trim($_POST["fecha"]), FILTER_SANITIZE_STRING);
}else{
	echo "FECHA NO VALIDA";
}


function FuncBitacora($fecha){
	/*------------------------CONSULTO-----------------*/
	global $conectar;
	try{

		$sql = "select * from registro where Fecha = :fecha ";
		$query = $conectar->prepare($sql);
		$query->bindparam(':fecha', $fecha);
		$query->execute();
		$tabla = $query->fetchAll();
		//cantida de registros
		$num = count($tabla);

		if ($num > 0) {
			return $tabla;
		}else{
			echo "NO SE PUDO GENERAR BITACORA DE ACUERDO A LA FECHA<br><br>";
		}

	}catch(PDOException $e){
		echo "ERROR AL CONSULTAR => ".$e->getMessage()."<br>";
	}

}

?>