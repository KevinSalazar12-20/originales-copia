<?php 
require("templates/header.php");
?>

<section class="buscador">
    <form action="resultadosbusquedaU.php" method=post >
    <h1 class="tituloBuscar">
			BUSCAR USUARIO
		</h1>
        <input  class="" type="search" id="Busqueda" name="busca" 
        placeholder="Ingrese datos de busqueda....." required>
        <br>
        <br>
        <input type="submit" class="Busqueda" value="Buscar">
    </form>
    
    <br>
    <br>
    <br>
    <br>

    <form action="resultadosbusquedab.php" method=post >
    <h1 class="tituloBuscar">
			BUSCAR BIEN
		</h1>
        <input  class="" type="search" id="Busqueda" name="busca" 
        placeholder="Ingrese datos de busqueda....." required>
        <br>
        <br>
        <input type="submit" class="Busqueda" value="Buscar">
    </form>

    <br>
    <br>
    <br>
    <br>

    <form action="resultadobusquedaa.php" method=post >
    <h1 class="tituloBuscar">
			BUSCAR ADMIN
		</h1>
        <input  class="" type="search" id="Busqueda" name="busca" 
        placeholder="Ingrese datos de busqueda....." required>
        <br>
        <br>
        <input type="submit" class="Busqueda" value="Buscar">
    </form>
</section>

    

<?php 
require("templates/footer.php");
?>