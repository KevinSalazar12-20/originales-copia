<?php

class ModeloVisitante
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }
    public function LlenarVisitante()
    {
        $this->db->query("SELECT * FROM visitante");
        return $this->db->registros();

    }
    public function RegistrarVisitante($datos){

        $this->db->query("INSERT INTO visitante(Cedula_Visitante, Nombre, Apellido) VALUE (:idvisitante, :nombre, :apellido);");
        $this->db->bind(':idvisitante', $datos['idvisitante']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        if($this->db->execute()){
            return 'Inserción exitosa!!!';
        }
        else{
            return 'Error en la inserción!!!';

        }

    }
    public function EditarVisitante($datos)
    {
        $this->db->query("UPDATE visitante SET Nombre =:nombre, Apellido =:apellido WHERE Cedula_Visitante =:idvisitante");
        $this->db->bind(':idvisitante', $datos['idvisitante']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        if ($this->db->execute()) {
            return 'Inserción exitosa!!!';
        } else {
            return 'Error en la inserción!!!';

        }
    }
    public function BorrarVisitante($datos)
    {
        $this->db->query("DELETE FROM visitante WHERE Cedula_Visitante = :idvisitante");
        $this->db->bind(':idvisitante', $datos['idvisitante']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}