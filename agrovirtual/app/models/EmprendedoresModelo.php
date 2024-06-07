<?php

class EmprendedoresModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obteneremprendedores()
    {
        $this->db->query('SELECT * from emprendedor');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function crearemprendedor($datos)
    {
        $this->db->query('INSERT INTO emprendedor (cedula, nombre, apellidos, direccion, telefono, 
        nombre_unidadp, descripcion_unidadp, logo, foto_personal, fecha_nacimiento, 
        municipio_id_municipio, estado) VALUES (:cedula, :nombre, :apellidos, :direccion, :telefono, :nombre_unidadp,:descripcion_unidadp,:logo,
         :foto_personal ,:fecha_nacimiento, :municipio_id_municipio);');
        
        // Vinculamos los valores que llegan del formulario con la consulta sql
        $this->db->bind(':documento', $datos['cedula']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellidos']);
        $this->db->bind(':direccion', $datos['direccion']);
        $this->db->bind(':telefono', $datos['telefono']);
        $this->db->bind(':unidad_productiva', $datos['nombre_unidadp']);
        $this->db->bind(':descripcion', $datos['descripcion_unidadp']);
        $this->db->bind(':logo', $datos['logo']);
        $this->db->bind(':foto_personal', $datos['foto_personal']);
        $this->db->bind(':fecha_nacimiento', $datos['fecha_nacimiento']);
        $this->db->bind(':municipio_id_emprendedor', $datos['municipio_id_municipio']);
        // Ejecutamos la consulta
        if ($this->db->execute()) {
            return 'Registro Hecho';
        } else {
            return 'Error al Registrar';
        }
    }
   
    public function actualizaremprendedor($datos)
    {
        $this->db->query('UPDATE emprendedor SET nombre = :nombre, apellidos = :email, direccion = :telefono,
        direccion = :direccion, telefono = :usuario, nombre_unidadp = :pass, logo = :rol, foto_personal = :rol, fecha_nacimiento = :rol,
        municipio_id_municipio = : , estado = :
        WHERE cedula = :id');

        // Vinculamos los valores
        $this->db->bind(':documento', $datos['cedula']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellidos']);
        $this->db->bind(':direccion', $datos['direccion']);
        $this->db->bind(':telefono', $datos['telefono']);
        $this->db->bind(':unidad_productiva', $datos['nombre_unidadp']);
        $this->db->bind(':descripcion', $datos['descripcion_unidadp']);
        $this->db->bind(':logo', $datos['logo']);
        $this->db->bind(':foto_personal', $datos['foto_personal']);
        $this->db->bind(':fecha_nacimiento', $datos['fecha_nacimiento']);
        $this->db->bind(':municipio_id_emprendedor', $datos['municipio_id_municipio']);
        // Ejecutar
        if ($this->db->execute()) {
            return 'Actualizó con exito';
        } else {
            return 'Error en la actualización';
        }
    }
    
    public function eliminaremprendedor($datos)
    {
        $this->db->query('DELETE FROM emprendedor WHERE cedula = :documento');
        $this->db->bind(':cedula', $datos['cedula']);
        // Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}