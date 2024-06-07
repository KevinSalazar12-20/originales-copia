<?php

class Categoria extends Controlador
{
    public function __construct()
    {
        $this->categoriamodelo = $this->modelo('CategoriaModelo');
    }

    public function index()  {
        
        
        $this->vista('formularios/categoria');
    }

    public function llenarTablaCategoria()
    {
        $datos = $this->categoriamodelo->obtenerCategorias();
        echo json_encode($datos);
    }

    public function nuevaCategoria()
    {
        $id=$_POST['id_categoria'];
        
        if (empty($id)) {
            $datos = [
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion']
        ];
            $datos = $this->categoriamodelo->crearCategorias($datos);
            echo json_encode($datos);
        } else {
            $datos = [
                'id_categoria' => $_POST['id_categoria'],
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion']
                    
        ];
        
            $datos = $this->categoriamodelo->actualizarCategorias($datos);
            echo json_encode($datos);
        }
    }

    public function eliminarCategoria()
    {
        $datos =[
            'id_categoria' => $_POST['id']
        ];

        $datos = $this->categoriamodelo->eliminarCategorias($datos);
        echo json_encode($datos);
    }
}