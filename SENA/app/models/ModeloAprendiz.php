<?php

class ModeloAprendiz
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }
    public function LlenarAprendiz()
    {
        $this->db->query("SELECT * FROM aprendiz");
        return $this->db->registros();

    }
    public function RegistrarAprendiz($datos){

        $this->db->query("INSERT INTO aprendiz(Cedula_Aprendiz, Nombre, Apellido, Ficha, Vigilantes_Cedula_Vigilante) VALUE (:id, :nombre, :apellido, :ficha, :cedvigilante);");
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':ficha', $datos['ficha']);
        $this->db->bind(':cedvigilante', $datos['cedvigilante']);
        if($this->db->execute()){
            return 'Inserción exitosa!!!';
        }
        else{
            return 'Error en la inserción!!!';

        }

    }
    public function EditarAprendiz($datos)
    {
        $this->db->query("UPDATE aprendiz SET Nombre =:nombre, Apellido =:apellido, Ficha =:ficha WHERE Cedula_Aprendiz =:id");
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':ficha', $datos['ficha']);
        if ($this->db->execute()) {
            return 'Inserción exitosa!!!';
        } else {
            return 'Error en la inserción!!!';

        }
    }
    public function BorrarAprendiz($datos)
    {
        $this->db->query("DELETE FROM aprendiz WHERE Cedula_Aprendiz = :id");
        $this->db->bind(':id', $datos['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}