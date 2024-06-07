
<?php  

	include('conexion.php');
	error_reporting(E_ERROR |  E_PARSE);
	

//  ----Validacion y Sanitizacion ---------------------------------------------------
	

	if(isset($_POST['nombre'])&&!empty($_POST['nombre'])){
		$Nombre = filter_var(trim($_POST['nombre']), FILTER_SANITIZE_STRING);
	}else{
		echo "NOMBRE NO VALIDO !"."<br>";
	}
	if(isset($_POST['usuario'])&&!empty($_POST['usuario'])){
		$Usuario = filter_var(trim($_POST['usuario']), FILTER_SANITIZE_STRING);
	}else{
		echo "USUARIO NO VALIDO !"."<br>";
	}
	if (isset($_POST["rol"]) &&! empty($_POST["rol"])) {
		$Rol = filter_var(trim($_POST["rol"]), FILTER_SANITIZE_STRING);
	}else{
		echo "ROL NO VALIDO" . "<br>";
	}
	if (isset($_POST["Pass"]) &&! empty($_POST["Pass"])) {
		$Pass = trim($_POST["Pass"]);
	}else{
		echo "PASSWORD NO VALIDO" . "<br>";
	}
	if (isset($_POST["correo"]) &&! empty($_POST["correo"])) {
		$Correo = trim($_POST["correo"]);
	}else{
		echo "CORREO INCORRECTO" . "<br>";
	}
	if (isset($_POST["telefono"]) &&! empty($_POST["telefono"])) {
		$Telefono = filter_var(trim($_POST["telefono"]), FILTER_SANITIZE_NUMBER_INT);
	}else{
		echo "TELEFONO NO VALIDO" . "<br>";
	}
	if (isset($_POST["direccion"]) &&! empty($_POST["direccion"])) {
		$Direccion = trim($_POST["direccion"]);
	}else{
		echo "DIRECCION NO VALIDA" . "<br>";
	}



//-----------------------------------------------------------------------------------------
	try
	{
	    $sql = "INSERT INTO usuarios(Id ,Nombre, Nombre_Usuario, Pass, Rol, telefono, direccion, correo) VALUES(DEFAULT,:nombre, :usuario, :pass, :rol, :telefono, :direccion, :correo)";  //
		$query = $conectar->prepare($sql);
		       
	    $query->bindparam(':nombre', $Nombre);
	    $query->bindparam(':usuario', $Usuario);
	    $query->bindparam(':pass', $Pass);
		$query->bindparam(':rol', $Rol);
		
	    $query->bindparam(':telefono', $Telefono);
	    $query->bindparam(':direccion', $Direccion);
	    $query->bindparam(':correo', $Correo);
	    $query->execute();
	    echo "<h2 style ='color: blue;'>INSERCION EXITOSA!</h2>";
	    echo "<a href='../INDEX.php'> Regresa</a> ";
	} catch (PDOException $e) {
	   echo "¡Error en la insercion: " . $e->getMessage() . "<br/>";
	   
	}
?>