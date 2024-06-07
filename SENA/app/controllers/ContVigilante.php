<?php
class ContVigilante extends Controlador
{
    public function __construct()
    {
        $this->ModeloVigilante = $this->modelo('ModeloVigilante');

    }
    public function index()
    {
        $this->vista('Vigilante/Vigilante');
    }
    public  function LlenarVigilante()
    {
        $datos = $this->ModeloVigilante->LlenarVigilante();
        echo json_encode($datos);

    }
    public function RegistrarVigilante()
    {
        $datos = [
            'idvigilante' => $_POST['idvigilante'],
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'turno' => $_POST['turno'],
        ];
        $datos = $this->ModeloVigilante->RegistrarVigilante($datos);
        echo json_encode($datos);

    }
    public function EditarVigilante()
    {
        $datos = [
            'idvigilante' => $_POST['idvigilante'],
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'turno' => $_POST['turno'],
        ];
        $datos = $this->ModeloVigilante->EditarVigilante($datos);
        echo json_encode($datos);

    }
    public function BorrarVigilante()
    {
        $datos = [
            'idvigilante' => $_POST['idvigilante'],
        ];
        $datos = $this->ModeloVigilante->BorrarVigilante($datos);
        echo json_encode($datos);

    }
}