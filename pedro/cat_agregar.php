<?php 
  require('Assets/plantilla_cabeza.php');

?>
<article>
    <section>
     	

    </section>

	<section>
      <h1> <i class="material-icons"> add_shopping_cart </i> Agregar Categorias</h1>

        <form action="logica/cat_agregar.php" method="post">

            
            <label for="id" class="">Id:</label> <br/>
            <input name="id" type="text" class="Id" required><br/>    
            <label for="Descripcion" class="">Descripcion:</label> <br/>
            <input name="descripcion" type="text" class="Descripcion" ><br/> 
            <br>
            <input type="submit"  class="SubmitLogin" value="Ingresar">      
            
        </form>
		

	</section>	
		

	
 </article>


<?php 
  require('Assets/plantilla_pie.php');

?>