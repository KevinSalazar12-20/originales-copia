<?php

    class Municipio extends Controlador
    {
        public function __construct()
        {
            $this->municipiomodelo = $this->modelo('MunicipioModelo');
        }

        public function index()  {
            $this->vista('formularios/municipio');
        }

        public function llenarTablaMunicipios()
        {
            $datos = $this->municipiomodelo->obtenerMunicipios();
            echo json_encode($datos);
        }

        public function registrarmunicipios()
        {
            $id=$_POST['id'];

            if (empty($id)) {
                $datos = [
                
                    'nombre' => $_POST['nombre'],
                    'departamento' => $_POST['departamento']

            ];
                $datos = $this->municipiomodelo->nuevomunicipio($datos);
                echo json_encode($datos);
            } else {
                $datos = [
                    'id' => isset($_POST['id']),
                    'nombre' => isset($_POST['nombre']),
                    'departamento' => isset($_POST['departamento'])

            ];
                $datos = $this->municipiomodelo->actualizarmunicipio($datos);
                echo json_encode($datos);
            }
        }
        
        public function eliminarmunicipio()
        {
            $datos =[
                'id_municipio' => $_POST['id']
            ];

            $datos = $this->municipiomodelo->eliminarMunicipios($datos);
            echo json_encode($datos);
        }
    }