<?php
require('Assets/plantilla_cabeza.php');
include_once('logica/cat_consultar.php');
error_reporting(E_ERROR |  E_PARSE);


?>
<article>
    <section>
     

    </section>

    <section>
        <h1>  Categorias</h1>
        <table>

            <th>Id</th>
            <th>Descripcion</th>
            <th>Acción</th>
            <th>Acción</th>
           

            <?php
            $datos = Consultar_Categorias();

            foreach ($datos as $dato) {
                echo "<tr>";
                echo "<td>";
                echo $dato[0];
                echo "</td>";
                echo "<td>";
                echo $dato[1];
                echo "</td>";
                
               
                echo "<td>";
                echo "<a href =logica/cat_borrar.php?id=$dato[0]> <i class='material-icons'> delete </i> </a>";
                echo "</td>";
                echo "<td>";
                echo "<a href =cat_editar.php?id=$dato[0]> <i class='material-icons'> edit </i> </a>";
                echo "</td>";
                echo "</tr>";
            }

            ?>

        </table>

    </section>



</article>



<?php
require('Assets/plantilla_pie.php');

?>