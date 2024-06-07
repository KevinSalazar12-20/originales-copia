<?php

class ModeloEquipo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }
    public function LlenarEquipo()
    {
        $this->db->query("SELECT * FROM equipos");
        return $this->db->registros();

    }
    public function RegistrarEquipo($datos){

        $this->db->query("INSERT INTO equipos(idEquipo, Serial_Equipo, Hora_Entrada, Hora_Salida, Aprendiz_Cedula_Aprendiz, Visitante_Cedula_Visitante) VALUE (:idequipo, :serial, :horaentrada, :horasalida, :idaprendiz, :idvisitante);");
        $this->db->bind(':idequipo', $datos['idequipo']);
        $this->db->bind(':serial', $datos['serial']);
        $this->db->bind(':horaentrada', $datos['horaentrada']);
        $this->db->bind(':horasalida', $datos['horasalida']);
        $this->db->bind(':idaprendiz', $datos['idaprendiz']);
        $this->db->bind(':idvisitante', $datos['idvisitante']);
        if($this->db->execute()){
            return 'Inserción exitosa!!!';
        }
        else{
            return 'Error en la inserción!!!';

        }

    }
    public function EditarEquipo($datos)
    {
        $this->db->query("UPDATE equipos SET Serial_Equipo =:serial WHERE idEquipo =:idequipo");
        $this->db->bind(':idequipo', $datos['idequipo']);
        $this->db->bind(':serial', $datos['serial']);
        if ($this->db->execute()) {
            return 'Inserción exitosa!!!';
        } else {
            return 'Error en la inserción!!!';

        }
    }
    public function BorrarEquipo($datos)
    {
        $this->db->query("DELETE FROM equipos WHERE idEquipo = :idequipo");
        $this->db->bind(':idequipo', $datos['idequipo']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}