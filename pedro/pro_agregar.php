<?php 
  require('Assets/plantilla_cabeza.php');
  include('logica/conectar.php');
try {       
  $sql = "SELECT * FROM Categoria ";   
  $query = $conexion->prepare($sql);  
  $query->execute();
  $datos = $query->fetchAll();	    //devuelve el resultado de la consulta en formato arreglo
  } catch (PDOException $e) {
echo "¡Error en la consulta: " . $e->getMessage() . "<br/>";

}

?>
<article>
    <section>
     	<h1> <i class="material-icons"> add_shopping_cart </i> Agregar Productos</h1>

        <form action="logica/pro_agregar.php" method="post">

            
            <label for="id" class="">Id:</label> <br/>
            <input name="id" type="text" class="Id" required><br/>   
             <label for="categoria" class="">categorias:</label> <br/>
            <select>
                <option value="0">Seleccione:</option>
                <?php foreach($datos as $dato) {
                    echo '<option value ="$dato[0].">'.$dato[1].'</option>';                    
                                 
                }
                ?>
                
            </select><br/>
                        
            <label for="precio" class="">Precio:</label> <br/>
            <input name="precio" type="text" class="precio" ><br/> 
             <label for="stock" class="">Stock:</label> <br/>
            <input name="stock" type="text" class="stock" ><br/> 
                      
            

    </section>

	<section>
       <label for="precio" class="">precio:</label> <br/>
       <input name="precio" type="text" class="nombre" ><br/>
        <label for="iamgen" class="">Foto:</label> <br/>
       <input name="imagen" type="file" class="imagen" >
       
       
       <br/> 
       <br/>     
       <input type="submit"  class="Guardar" value="Guardar">      
            
        </form>
		

	</section>	
		

	
 </article>


<?php 
  require('Assets/plantilla_pie.php');

?>