<?php

class MunicipioModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerMunicipios()
    {
        $this->db->query('SELECT * from municipio');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function nuevomunicipio($datos)
    {
        $this->db->query('INSERT INTO municipio (nombre, departamento) VALUES (:nombre, :departamento);');
        
        // Vinculamos los valores que llegan del formulario con la consulta sql
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':departamento', $datos['departamento']);
        // Ejecutamos la consulta
        if ($this->db->execute()) {
            return 'Registro Hecho';
        } else {
            return 'Error al Registrar';
        }
    }
   
    public function actualizarmunicipio($datos)
    {
        $this->db->query('UPDATE municipio SET nombre = :nombre, departamento= :departamento WHERE id_municipio = :id');

        // Vinculamos los valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':departamento', $datos['departamento']);

        // Ejecutar
        if ($this->db->execute()) {
            return 'Actualizó con exito';
        } else {
            return 'Error en la actualización';
        }
    }
    
    public function eliminarMunicipios($datos)
    {
        $this->db->query('DELETE FROM municipio WHERE id_municipio = :id');
        $this->db->bind(':id', $datos['id_municipio']);

        // Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}