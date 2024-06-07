<?php
class ContEquipo extends Controlador
{
    public function __construct()
    {
        $this->ModeloEquipo = $this->modelo('ModeloEquipo');

    }
    public function index()
    {
        $this->vista('Equipos/Equipos');
    }
    public  function LlenarEquipo()
    {
        $datos = $this->ModeloEquipo->LlenarEquipo();
        echo json_encode($datos);

    }
    public function RegistrarEquipo()
    {
        $datos = [
            'idequipo' => $_POST['idequipo'],
            'serial' => $_POST['serial'],
            'horaentrada' => $_POST['horaentrada'],
            'horasalida' => $_POST['horasalida'],
            'idaprendiz' => $_POST['idaprendiz'],
            'idvisitante' => $_POST['idvisitante'],
        ];
        $datos = $this->ModeloEquipo->RegistrarEquipo($datos);
        echo json_encode($datos);

    }
    public function EditarEquipo()
    {

        $datos = [
            'idequipo' => $_POST['idequipo'],
            'serial' => $_POST['serial'],
        ];
        $datos = $this->ModeloEquipo->EditarEquipo($datos);
        echo json_encode($datos);

    }
    public function BorrarEquipo()
    {
        $datos = [
            'idequipo' => $_POST['idequipo'],
        ];
        $datos = $this->ModeloEquipo->BorrarEquipo($datos);
        echo json_encode($datos);

    }
}