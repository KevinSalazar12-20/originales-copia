<?php 
require "templates/header_exclusivo_login.php";
?>

<section class = "login">
    <form action="logica/v_login.php" method="POST">

    
        <label for="usuario" class="">Usuario:</label> <br/>
        <input name="usuario" type="text" class="" required><br/> 

        <label for="pass" class="">Password:</label> <br/>
        <input name="pass" type="password" class="" required><br/> 

        <br>
        <label for="rol" class="">Rol:</label> <br/>
        <select name="rol">
            <option>Vigilante</option>
            <option>Administrativo</option>
        </select>

        <br>
        <br>
        <input type="submit"class="SubmitLogin" value="Ingresar">      
        </form>    
</section>


<?php 
require "templates/footer.php";
?>