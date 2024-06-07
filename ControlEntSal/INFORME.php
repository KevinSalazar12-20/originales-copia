<?php 
require("templates/header.php");
?>

<section class="Buscarinforme">
	<form action="informeResultado.php" method="POST" class="formBuscarInforme">
		<h1>GENERAR REGISTRO</h1>
		<label for="fecha">FECHA</label>
		<input type="date" name="fecha" required=""><br><br>
		<input type="submit" name="" class="botonBuscarinforme" value="CONSULTAR">
	</form>

</section>

<?php 
require("templates/footer.php");
?>