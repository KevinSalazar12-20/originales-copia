<?php 
require("templates/header.php");
?>
<section class="sena">
	<form action="logica/agregar_usuario_sena.php" method="POST">


		<h1>REGISTRAR USUARIO SENA</h1>



		<label for="cedula" class="">
				Cc
		</label>
		<input type="text" name="cedula" required=""><br><br>



		<label for="nombres" class="">
				Nombre
		</label>
		<input type="text" name="nombres" required=""><br><br>


		<label for="apellidos" class="">
				Apellido
		</label>
		<input type="text" name="apellidos" required=""><br><br>


		<label for="correos" class="">
				Correo
		</label>
		<input type="email" name="correos" required=""><br><br>



		<label for="telefonos" class="">
				Telefono
		</label>
		<input type="phone" name="telefonos" required=""><br><br>


		<label for="cargos" class="">
					Cargo
		</label>
		<select name="cargos">
				<option>Aprendiz</option>
				<option>Instructor</option>
				<option>Visitante</option>
				<option>Funcionario</option>
		</select><br><br>

		<input type="submit" name="" value="GUARDAR" class="boton">

	</form>
</section>

<?php 
require("templates/footer.php");
?>