<?php  

	include('conexion.php');
  error_reporting(E_ERROR |  E_PARSE);
  
  if(isset($_POST['cc'])&&!empty($_POST['cc'])){
		$cc = filter_var(trim($_POST['cc']));
	}else{
		echo "NOMBRE NO VALIDO !"."<br>";
	}


  if(isset($_POST['marca'])&&!empty($_POST['marca'])){
		$marca = filter_var(trim($_POST['marca']));
	}else{
		echo "NOMBRE NO VALIDO !"."<br>";
	}


    
  if(isset($_POST['serie'])&&!empty($_POST['serie'])){
		$serie = filter_var(trim($_POST['serie']),FILTER_SANITIZE_NUMBER_INT);
	}else{
		echo "NOMBRE NO VALIDO !"."<br>";
	}


    
  if(isset($_POST['tipo'])&&!empty($_POST['tipo'])){
		$tipo = filter_var(trim($_POST['tipo']));
	}else{
		echo "NOMBRE NO VALIDO !"."<br>";
	}

    try{
        $sql= "INSERT INTO bien(IdBien,propi,Marca, Referencia, Dispositivo) VALUES (DEFAULT,:cc,:marca,:serie,:tipo)";
        $query = $conectar ->prepare($sql);
        $query->bindparam(':cc',$cc);
        $query->bindparam(':marca',$marca);
        $query->bindparam(':serie',$serie);
        $query->bindparam(':tipo',$tipo);
        $query->execute();
        echo "<h2 style ='color: blue;'>INSERCION EXITOSA!</h2>";
        echo "<a href='../INDEX.php'> Regresa</a> ";
    } catch (PDOException $e) {
        echo "¡Error en la insercion: " . $e->getMessage() . "<br/>";
        
     }


?>