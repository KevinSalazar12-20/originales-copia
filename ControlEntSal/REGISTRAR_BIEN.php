<?php 
require("templates/header.php");
?>

<section class="RegistrarBien">
	<form  method="POST" action="logica/agregar_bien.php">


		<h1>REGISTRAR BIEN</h1>


		<label for="cc" class="">
			ID DUEÑO:
		</label>
		<input type="text" name="cc" required=""><br><br>



		<label for="marca" class="">
			MARCA:
		</label>
		<input type="text" name="marca" required=""><br><br>


		<label for="serie" class="">
			SERIAL O REFERENCIA:
		</label>
		<input type="text" name="serie" required=""><br><br>

		
		<label for="tipo" class="">
			TIPO DE DISPOSITIVO:
		</label>
		<select name="tipo">
        <option>Portatil</option>
        <option>Mouse</option>
		<option>Teclado</option>
		<option>Otro</option>
    	</select>
		<br>
		<br>
		<input type="submit" name="" value="GUARDAR" class="boton">
	</form>
</section>

<?php 
require("templates/footer.php");
?>