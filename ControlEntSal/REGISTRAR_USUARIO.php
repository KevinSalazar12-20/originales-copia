<?php 
require("templates/header.php");
?>

<section class="RegistrarUsuario">
	<form class="registrar_usuario" method="POST" action="logica/agregar_usuario.php">
		<h1>REGISTRAR USUARIO</h1>
		


		<label for="nombre" class="">
			NOMBRE
		</label>
		<input type="text" name="nombre" required=""><br><br>


		<label for="usuario" class="">
			USUARIO
		</label>
		<input type="usuario" name="usuario" required=""><br><br>


		<label for="rol" class="">
			ROL
		</label>
		<select name="rol">
        <option>usuario</option>
        <option>Administrador</option>
    	</select>
		<br>
		<br>

		<label for="contraseña" class="">
			CONTRASEÑA
		</label>
		<input type="password" name="Pass" required=""><br><br>


		<label for="CORREO" class="">
			CORREO
		</label>
		<input type="email" name="correo" required=""><br><br>


		<label for="telefono" class="">
			TELEFONO
		</label>
		<input type="phone" name="telefono" required=""><br><br>

		
		<label for="direccion" class="">
			DIRECCION
		</label>
		<input type="text" name="direccion" required=""><br><br>
		<input type="submit" name="" value="GUARDAR" class="boton">

	</form>
</section>

<?php 
require("templates/footer.php");
?>