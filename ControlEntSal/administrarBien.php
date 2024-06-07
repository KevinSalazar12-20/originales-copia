<?php 
require('templates/header.php');
$id = $_GET["id"];
include('logica/conexion.php');
try{

	$sql = "select * from bien where IdBien = :id";
	$query = $conectar->prepare($sql);	
	$query->bindparam(':id', $id);
	$query->execute();
	$datos = $query->fetchAll();

}catch(PDOException $e){
	echo "ERROR AL CONSULTAR" .$e->getMessage(). "<br>";
}

?>

<section class="administraBien">
	<form action="logica/cat_editar.php" method="POST">
		<h1 class="tituloAdministrar">
			ADMINISTRAR BIEN
		</h1>
		<label for="id">ID</label>
		<input type="text" name="id" readonly="" value="<?php echo $datos[0][0] ?>"><br><br>

		<label for="propi" class="">IDDUEÑO</label>
		<input type="text" name="propi" required="" value="<?php echo $datos[0][1] ?>"><br><br>

		<label for="marca" class="">MARCA</label>
		<input type="text" name="marca" required="" value="<?php echo $datos[0][2] ?>"><br><br>

		<label for="referencia" class="">REFERENCIA</label>
		<input type="text" name="referencia" required="" value="<?php echo $datos[0][3] ?>"><br><br>

		<label for="dispositivo" class="">DISPOSITIVO</label>
		<input type="text" name="dispositivo" required="" value="<?php echo $datos[0][4] ?>"><br><br>
		
		<input type="submit" name="" value="EDITAR" class="botonadministraBien">
	</form>
</section>

<?php 
require('templates/footer.php');
?>