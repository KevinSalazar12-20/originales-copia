<?php 
  require('plantilla_cabeza.php');

?>
<article>
    <section>
        <h1> <i class="material-icons"> adb </i> Quienes Somos ?</h1>
        <p>
            Somos la libreria mas antigua del globo terraqueo, tenemos libros de la epoca de matusalen y sus secuaces, Abraham y job fueron nuestros primeros clientes.
            Visitanos para tener el gusto de atenderte.
            Los 12 apostoles y el superRaton nos visitaron y se llevaron los mejores libros de Cocina y mesa.
            Maradona probó nuestro cafe y pan cacho junto con El chavo del ocho.


        </p>  	

    </section>



	<section>
      <h1> <i class="material-icons"> adb </i> Agregar Libros</h1>

        <form action="agregar.php" method="post">
        <label for="Codigo" class="">Codigo:</label> <br/>
        <input name="Codigo" type="text" class="Codigo" required><br/>     
        <label for="Autor" class="">Autor:</label> <br/>
        <input name="Autor" type="text" class="Autor" required><br/> 
        <label for="Titulo" class="">Titulo:</label> <br/>
        <input name="Titulo" type="text" class="Titulo" required><br/> 
        <label for="Precio" class="">Precio:</label> <br/>
        <input name="Precio" type="text" class="Precio" required><br/> 
        <label for="Tipo" class="">Tipo:</label> <br/>
        <input name="Tipo" type="text" class="Tipo" required><br/>  <br/> 
        <input type="submit"  class="SubmitLogin" value="Ingresar">      
        
        </form>
		

	</section>	
		

	
 </article>


<?php 
  require('plantilla_pie.php');

?>