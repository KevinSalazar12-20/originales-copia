<?php
require("templates/header.php");
include_once('logica/buscar.php');
?>
<section class="resultados">
    <table>
        <th>&nbsp;&nbsp;CC&nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp;NOMBRES&nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp;USUARIO&nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp;CONTRASEÑA&nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp;ROL&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;TELEFONO&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;DIRECCION&nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp;CORREO&nbsp;&nbsp;</th>

        <?php
        if (isset($_POST["busca"]) &&! empty($_POST["busca"])) {
			$busca = $_POST["busca"];
		}else{
			echo "ERROR";
		} 
        $datos = FuncbusquedaU($busca);



        foreach($datos as $dato){
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
            

            echo "<td>";
			echo $dato[5];
            echo "</td>";
            

            echo "<td>";
			echo $dato[6];
            echo "</td>";
            

            echo "<td>";
			echo $dato[7];
            echo "</td>";
            




            echo "</tr>";


        }
        ?>


    </table>  
</section>


<?php 
require 'templates/footer.php';
?>