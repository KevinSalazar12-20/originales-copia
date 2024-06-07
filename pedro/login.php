<?php
require('Assets/plantilla_login.php');
error_reporting(E_ERROR |  E_PARSE);
?>

<article>
	
    <Section></Section>
	<section class = "login">
	<form action="logica/cat_agregar.php" method="post">

            
            <label for="id" class="">Usuario:</label> <br/>
            <input name="id" type="text" class="Id" required><br/>    
            <label for="Descripcion" class="">Password:</label> <br/>
            <input name="descripcion" type="text" class="Descripcion" required><br/> 
            <br>
            <input type="submit"  class="SubmitLogin" value="Ingresar">      
            
    </form>


	</section>



</article>


<?php
require('Assets/plantilla_pie.php');

?>