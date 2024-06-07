<?php
class ContVisitante extends Controlador
{
    public function __construct()
    {
        $this->ModeloVisitante = $this->modelo('ModeloVisitante');

    }
    public function index()
    {
        $this->vista('Visitante/Visitante');
    }
    public  function LlenarVisitante()
    {
        $datos = $this->ModeloVisitante->LlenarVisitante();
        echo json_encode($datos);

    }
    public function RegistrarVisitante()
    {
        $datos = [
            'idvisitante' => $_POST['idvisitante'],
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
        ];
        $datos = $this->ModeloVisitante->RegistrarVisitante($datos);
        echo json_encode($datos);

    }
    public function EditarVisitante()
    {
        $datos = [
            'idvisitante' => $_POST['idvisitante'],
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
        ];
        $datos = $this->ModeloVisitante->EditarVisitante($datos);
        echo json_encode($datos);

    }
    public function BorrarVisitante()
    {
        $datos = [
            'idvisitante' => $_POST['idvisitante'],
        ];
        $datos = $this->ModeloVisitante->BorrarVisitante($datos);
        echo json_encode($datos);

    }
}