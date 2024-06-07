<?php  

	include('conexion.php');
    error_reporting(E_ERROR |  E_PARSE);
    
    if(isset($_POST['cedula'])&&!empty($_POST['cedula'])){
		$cedula = filter_var(trim($_POST['cedula']),FILTER_SANITIZE_NUMBER_INT);
	}else{
        echo "CEDULA NO VALIDO !"."<br>";
    }


    if(isset($_POST['nombres'])&&!empty($_POST['nombres'])){
		$nombres = filter_var(trim($_POST['nombres']));
	}else{
        echo "NOMBRE NO VALIDO !"."<br>";
    }


    if(isset($_POST['apellidos'])&&!empty($_POST['apellidos'])){
		$apellidos = filter_var(trim($_POST['apellidos']));
	}else{
        echo "APELLIDO NO VALIDO !"."<br>";
    }


    if(isset($_POST['correos'])&&!empty($_POST['correos'])){
		$correos = filter_var(trim($_POST['correos']));
	}else{
        echo "CORREO NO VALIDO !"."<br>";
    }


    if(isset($_POST['telefonos'])&&!empty($_POST['telefonos'])){
		$telefonos = filter_var(trim($_POST['telefonos']),FILTER_SANITIZE_NUMBER_INT);
	}else{
        echo "TELEFONO NO VALIDO !"."<br>";
    }


    if(isset($_POST['cargos'])&&!empty($_POST['cargos'])){
		$cargos = filter_var(trim($_POST['cargos']));
	}else{
        echo "CARGO NO VALIDO !"."<br>";
    }




    try
	{
	    $sql = "INSERT INTO usuario_sena(CC,Nombre,Apellido,Correo,Telefono,Cargo)VALUES(:cedula,:nombres,:apellidos,:correos,:telefonos,:cargos)";  //
		$query = $conectar->prepare($sql);
		$query->bindparam(':cedula', $cedula);       
	    $query->bindparam(':nombres', $nombres);
	    $query->bindparam(':apellidos', $apellidos);
	    $query->bindparam(':correos', $correos);
		$query->bindparam(':telefonos', $telefonos);
	    $query->bindparam(':cargos', $cargos);
	    $query->execute();
	    echo "<h2 style ='color: blue;'>INSERCION EXITOSA!</h2>";
	    echo "<a href='../INDEX.php'> Regresa</a> ";
	} catch (PDOException $e) {
	   echo "¡Error en la insercion: " . $e->getMessage() . "<br/>";
	   
	}
?>







