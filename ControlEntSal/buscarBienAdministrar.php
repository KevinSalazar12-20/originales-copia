<?php 
require("templates/header.php");
?>

<section class="sectionBuscar">
	
	<form action="logica/buscarBien.php" method="POST">
		<h1 class="tituloBuscar">
			BUSCAR BIEN
		</h1>
		
		<label for="Cc" class=""> IdDueño</label>
		<input type="text" name="Cc" required=""><br><br>
		<label for="serial">SERIAL O REFERENCIA</label>
		<input type="text" name="serial" required=""><br><br>
		<input type="submit" name="" value="BUSCAR" class="btnBuscar">

	</form>

</section>

<?php 
require("templates/footer.php");
?>