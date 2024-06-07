<?php 
  require('Assets/plantilla_cabeza.php');
$id =$_GET['id'];
include('logica/conectar.php');
try {       
  $sql = "SELECT * FROM Categoria WHERE idcategoria = :id";   
  $query = $conexion->prepare($sql);  
  $query->bindparam(':id', $id);    
  $query->execute();
  $datos = $query->fetchAll();	    //devuelve el resultado de la consulta en formato arreglo
  } catch (PDOException $e) {
echo "¡Error en la consulta: " . $e->getMessage() . "<br/>";

}


?>
<article>
    <section>
     	

    </section>



	<section>
      <h1> <i class="material-icons"> add_shopping_cart </i> Editar Categorias</h1>
     

        <form action="logica/cat_editar.php" method="post">

        <?php foreach($datos as $dato) {?>
            <label for="id" class="">Id:</label> <br/>
            <input name="id" readonly type="text" class="Id" value ="<?php echo $dato[0]; ?>"> <br/>    
            <label for="Descripcion" class="">Descripcion:</label> <br/>
            <input name="descripcion" type="text" class="Descripcion"value ="<?php echo $dato[1]; ?>"><br/> 
            <br>
            <input type="submit"  class="SubmitLogin" value="Actualizar">      
        <?php } ?>    
        </form>
		

	</section>	
		

	
 </article>


<?php 
  require('Assets/plantilla_pie.php');

?>