<?php  
include('conexion.php');

// validar datos enviados
if(isset($_POST['borra']) &&!empty($_POST['borra'])){
	$borra = filter_var(trim($_POST['borra']), FILTER_SANITIZE_STRING);
}else{
	echo 'ERROR <br>';
}




/*BUSCO EN LA TABLA USUARIO*/
try{

	$sql = "DELETE FROM usuarios WHERE Id = :borra";
	$query = $conectar->prepare($sql);
	$query->bindparam(':borra', $borra);
	$query->execute();
	echo "<h2 style ='color: blue;'>Borrado Realizado !</h2>";
  echo "<a href='../index.php'> Regresa</a> ";
} catch (PDOException $e) {
  echo "¡Error en el Borrado: " . $e->getMessage() . "<br/>";
  
}
?>

<?php 
include('conexion.php'); 

if(isset($_POST['borrar']) &&!empty($_POST['borrar'])){
	$borrar = filter_var(trim($_POST['borrar']), FILTER_SANITIZE_STRING);
}else{
	echo 'ERROR <br>';
}


try{

	$sql = "DELETE FROM bien WHERE IdBien = :borrar";
	$query = $conectar->prepare($sql);
	$query->bindparam(':borrar', $borrar);
	$query->execute();
	echo "<h2 style ='color: blue;'>Borrado Realizado !</h2>";
  echo "<a href='../index.php'> Regresa</a> ";
} catch (PDOException $e) {
  echo "¡Error en el Borrado: " . $e->getMessage() . "<br/>";
  
}


?>



<?php 
include('conexion.php'); 

if(isset($_POST['borrare']) &&!empty($_POST['borrare'])){
	$borrare = filter_var(trim($_POST['borrare']), FILTER_SANITIZE_STRING);
}else{
	echo 'ERROR <br>';
}


try{

	$sql = "DELETE FROM usuario_sena WHERE CC = :borrare";
	$query = $conectar->prepare($sql);
	$query->bindparam(':borrare', $borrare);
	$query->execute();
	echo "<h2 style ='color: blue;'>Borrado Realizado !</h2>";
  echo "<a href='../index.php'> Regresa</a> ";
} catch (PDOException $e) {
  echo "¡Error en el Borrado: " . $e->getMessage() . "<br/>";
  
}


?>


