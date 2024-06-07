<?php 

require 'templates/header.php';
require 'logica/conexion.php';
?>
<section class="index">
    <form action="logica/mostrar.php"></form>

    <table class="usuarios">
        <label class="res">Usuarios</label>
        <thead>
            <tr>
                <th>&nbsp;&nbsp;ID&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;NOMBRES&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;USUARIO&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;CONTRASEÑA&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;ROL&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;TELEFONO&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;DIRECCION&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;CORREO&nbsp;&nbsp;</th>

            </tr>
        </thead>

        <?php
        $sql = "SELECT * FROM usuarios";
        $query  = $conectar->query($sql);
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)){
            echo'
            <tr>
                <td>'.$fila['Id'].'</td>
                <td>'.$fila['Nombre'].'</td>  
                <td>'.$fila['Nombre_Usuario'].'</td>  
                <td>'.$fila['Pass'].'</td>  
                <td>'.$fila['Rol'].'</td>  
                <td>'.$fila['telefono'].'</td>      
                <td>'.$fila['direccion'].'</td>  
                <td>'.$fila['correo'].'</td>
                  
            </tr>
            ';
        }
    ?>
    </table>

    <table class="bienes">
        <label class="ras">Bienes</label>
        <thead>
            <tr>

                <th>&nbsp;&nbsp;IdBien&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;IdDueño&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Marca&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Referencia&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;dispositivo&nbsp;&nbsp;</th>

            </tr>
        </thead>

        <?php
        $sql = "SELECT * FROM bien";
        $query  = $conectar->query($sql);
        while ($filas = $query->fetch(PDO::FETCH_ASSOC)){
            echo'
            <tr>
                <td>'.$filas['IdBien'].'</td>
                <td>'.$filas['propi'].'</td>
                <td>'.$filas['Marca'].'</td>  
                <td>'.$filas['Referencia'].'</td>  
                <td>'.$filas['Dispositivo'].'</td>  
                
                  
            </tr>
            ';
        }
    ?>
    </table>

    <table class="admis">
        <label class="ris">Admin</label>
        <thead>
            <tr>

                <th>&nbsp;&nbsp;CC&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Nombre&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Apellido&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Correo&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Telefono&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Cargo&nbsp;&nbsp;</th>

            </tr>
        </thead>

        <?php
        $sql = "SELECT * FROM usuario_sena";
        $query  = $conectar->query($sql);
        while ($filas = $query->fetch(PDO::FETCH_ASSOC)){
            echo'
            <tr>
                <td>'.$filas['CC'].'</td>
                <td>'.$filas['Nombre'].'</td>
                <td>'.$filas['Apellido'].'</td>  
                <td>'.$filas['Correo'].'</td>  
                <td>'.$filas['Telefono'].'</td>
                <td>'.$filas['Cargo'].'</td>   
                
                 
            </tr>
            ';
        }
    ?>
    </table>
</section>
<?php 
require 'templates/footer.php';
?>