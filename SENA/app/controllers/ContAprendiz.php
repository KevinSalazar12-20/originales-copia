<?php
class ContAprendiz extends Controlador
{
    public function __construct()
    {
        $this->ModeloAprendiz = $this->modelo('ModeloAprendiz');

    }
    public function index()
    {
        $this->vista('Aprendiz/Aprendiz');
    }
    public  function LlenarAprendiz()
    {
        $datos = $this->ModeloAprendiz->LlenarAprendiz();
        echo json_encode($datos);

    }
    public function RegistrarAprendiz()
    {
        $datos = [
            'id' => $_POST['id'],
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'ficha' => $_POST['ficha'],
            'cedvigilante' => $_POST['cedvigilante'],
            
        ];
        $datos = $this->ModeloAprendiz->RegistrarAprendiz($datos);
        echo json_encode($datos);

    }
    public function EditarAprendiz()
    {

        $datos = [
            'id' => $_POST['id'],
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'ficha' => $_POST['ficha'],
            
        ];
        $datos = $this->ModeloAprendiz->EditarAprendiz($datos);
        echo json_encode($datos);

    }
    public function BorrarAprendiz()
    {
        $datos = [
            'id' => $_POST['id'],
        ];
        $datos = $this->ModeloAprendiz->BorrarAprendiz($datos);
        echo json_encode($datos);

    }
}