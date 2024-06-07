<?php
include('conectar.php');
error_reporting(E_ERROR |  E_PARSE);

//-------------validamos envio --------------------------------------------
if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id= filter_var(trim($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
}else{
    echo "el id enviado es invalido !"."<br>";
}
//-----------------------------------------------------------------------------------------

try {
    $sql = "DELETE FROM categoria WHERE idcategoria = :id";  
    $query = $conexion->prepare($sql);        
    $query->bindparam(':id', $id);    
    $query->execute();
    echo "<h2 style ='color: blue;'>Borrado Realizado !</h2>";
    echo "<a href='../index.php'> Regresa</a> ";
  } catch (PDOException $e) {
   echo "¡Error en el Borrado: " . $e->getMessage() . "<br/>";
   
}
?>
