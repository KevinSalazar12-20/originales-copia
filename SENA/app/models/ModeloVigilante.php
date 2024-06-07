<?php

class ModeloVigilante
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }
    public function LlenarVigilante()
    {
        $this->db->query("SELECT * FROM vigilantes");
        return $this->db->registros();

    }
    public function RegistrarVigilante($datos){

        $this->db->query("INSERT INTO vigilantes(Cedula_Vigilante, Nombre, Apellido, Turno) VALUE (:idvigilante, :nombre, :apellido, :turno);");
        $this->db->bind(':idvigilante', $datos['idvigilante']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':turno', $datos['turno']);
        if($this->db->execute()){
            return 'Inserción exitosa!!!';
        }
        else{
            return 'Error en la inserción!!!';

        }

    }
    public function EditarVigilante($datos)
    {
        $this->db->query("UPDATE vigilantes SET Nombre =:nombre, Apellido =:apellido, Turno =:turno WHERE Cedula_Vigilante =:idvigilante");
        $this->db->bind(':idvigilante', $datos['idvigilante']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':turno', $datos['turno']);
        if ($this->db->execute()) {
            return 'Inserción exitosa!!!';
        } else {
            return 'Error en la inserción!!!';

        }
    }
    public function BorrarVigilante($datos)
    {
        $this->db->query("DELETE FROM vigilantes WHERE Cedula_Vigilante = :idvigilante");
        $this->db->bind(':idvigilante', $datos['idvigilante']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}