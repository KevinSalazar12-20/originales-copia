<?php 
require("templates/header.php");
?>

<section class="buscador">
    <form action="logica/borrar.php" method=post >
    <h1 class="tituloBuscar">
            BORRAR USUARIO
		</h1>
        <input  class="" type="search" id="Busqueda" name="borra" 
        placeholder="Ingrese datos de lo que va borrar....." required>
        <br>
        <br>
        <input type="submit" class="Busqueda" value="Borrar">
    </form>
    
    <br>
    <br>
    <br>
    <br>

    <form action="logica/borrar.php" method=post >
    <h1 class="tituloBuscar">
			BORRAR BIEN
		</h1>
        <input  class="" type="search" id="Busqueda" name="borrar" 
        placeholder="Ingrese datos de lo que va borrar....." required>
        <br>
        <br>
        <input type="submit" class="Busqueda" value="Borrar">
    </form>

    <br>
    <br>
    <br>
    <br>

    <form action="logica/borrar.php" method=post >
    <h1 class="tituloBuscar">
            BORRAR ADMIN
		</h1>
        <input  class="" type="search" id="Busqueda" name="borrare" 
        placeholder="Ingrese datos de lo que va borrar....." required>
        <br>
        <br>
        <input type="submit" class="Busqueda" value="Buscar">
    </form>
</section>

    

<?php 
require("templates/footer.php");
?>