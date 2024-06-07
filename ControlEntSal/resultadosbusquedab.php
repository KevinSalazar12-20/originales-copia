<?php
require("templates/header.php");
include_once('logica/buscar.php');
?>

<section class="resultados2">
    <table>
        <th>&nbsp;&nbsp;IdBien&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;IdDueño&nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp;Marca&nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp;Referencia&nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp;Dispositivo&nbsp;&nbsp;</th>
		
        
        <?php
        if (isset($_POST["busca"]) &&! empty($_POST["busca"])) {
			$busca = $_POST["busca"];
		}else{
			echo "ERROR";
		} 
        $datos = Funcbusquedab($busca);



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
            

           
            
            echo "</tr>";


        }
        ?>


    </table>  
</section>
<?php 
require 'templates/footer.php';
?>