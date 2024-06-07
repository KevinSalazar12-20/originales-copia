<?php 
require("templates/header.php");
include_once('logica/buscarBitacora.php');
?>

<section class="sesioninformeResultado">
	
	<h1 class="tituloBitacora">BITACORA</h1>

	<table border="" class="tablaResultado">

		<th>ID REGISTRO</th>
		<th>FECHA</th>
		<th>HORA DE SALIDA</th>
		<th>ESTADO ENTRADA</th>
		<th>ESTADO SALIDA</th>

		<?php

		if (isset($_POST["fecha"]) &&! empty($_POST["fecha"])) {
			$fecha = $_POST["fecha"];
		}else{
			echo "ERROR";
		} 

		$datos = FuncBitacora($fecha);

		foreach ($datos as $dato) {
			echo "<tr>";

			echo "<td>";
			echo $dato[0];
			echo "</td>";

			echo "<td>";
			echo $dato[1];
			echo "</td>";

			echo "<td>";
			echo $dato[2];
			echo "</td>";

			echo "<td>";
			echo $dato[3];
			echo "</td>";

			echo "<td>";
			echo $dato[4];
			echo "</td>";

			echo "</tr>";
		}
		?>
	</table>

</section>


<?php 
require("templates/footer.php");
?>