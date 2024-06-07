<?php
class CategoriaModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerCategorias()
    {
        $this->db->query('SELECT * from categoria');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function crearCategorias($datos)
    {
        $this->db->query('INSERT INTO categoria (id_categoria, nombre, descripcion) VALUES (:id_categoria, :nombre, :descripcion);');
        
        // Vinculamos los valores que llegan del formulario con la consulta sql
        $this->db->bind(':id_categoria', $datos['id_categoria']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':descripcion', $datos['descripcion']);
        // Ejecutamos la consulta
        if ($this->db->execute()) {
            return 'Inserción exitosa';
        } else {
            return 'Error en la inserción';
        }
    }
   
    public function actualizarCategorias($datos)
    {
        $this->db->query('UPDATE categoria SET nombre = :nom, descripcion = :descrip WHERE id_categoria = :id');

        // Vinculamos los valores
        $this->db->bind(':id', $datos['id_categoria']);
        $this->db->bind(':nom', $datos['nombre']);
        $this->db->bind(':des', $datos['descripcion']);

        // Ejecutar
        if ($this->db->execute()) {
            return 'Actualizó con exito';
        } else {
            return 'Error en la actualización';
        }
    }
    
    public function eliminarCategorias($datos)
    {
        $this->db->query('DELETE FROM categoria WHERE id_categoria = :id');
        $this->db->bind(':id', $datos['id_categoria']);

        // Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}