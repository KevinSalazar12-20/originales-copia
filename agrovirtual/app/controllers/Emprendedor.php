<?php

class Emprendedor extends Controlador
{
    public function __construct() {

        $this->emprendedoresmodelo = $this->modelo('EmprendedoresModelo');
        
    }

    public function index()  {
        
        
        $this->vista('formularios/emprendedor');
    }

    public function llenarTablaEmprendedores()
    {
        $datos = $this->emprendedoresmodelo->obteneremprendedores();
        echo json_encode($datos);
    }
    
    public function crearUsuarioSistema()
    {
		$id=$_POST['id'];
		
	
        if (empty($id)) {
            $datos = [
                'nombre' => $_POST['nombre'],
                'email' => $_POST['email'],
                'telefono' => $_POST['telefono'],
                'direccion' => $_POST['direccion'],
                'usuario' => $_POST['usuario'],
                'pass' => password_hash($_POST['pass'], PASSWORD_BCRYPT, ['cost' => 7]),
                'rol' => $_POST['rol']
        ];
            $datos = $this->usuariosistemamodelo->crearUsuarioSistema($datos);
            echo json_encode($datos);
        } else {
            $datos = [
                'id' => $_POST['id'],
                'nombre' => $_POST['nombre'],
                'email' => $_POST['email'],
                'telefono' => $_POST['telefono'],
                'direccion' => $_POST['direccion'],
                'usuario' => $_POST['usuario'],
                'pass' => password_hash($_POST['pass'], PASSWORD_BCRYPT, ['cost' => 7]),
                'rol' => $_POST['rol']
			
        ];
            $datos = $this->usuariosistemamodelo->actualizarUsuarioSistema($datos);
            echo json_encode($datos);
        }
    }
    
    public function eliminaremprendedor()
    {
        $datos =[
            'cedula' => $_POST['cedula']
        ];
	
        $datos = $this->emprendedoresmodelo-> eliminaremprendedor($datos);
        echo json_encode($datos);
    }
}
