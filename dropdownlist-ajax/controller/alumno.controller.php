<?php
require_once 'model/alumno.entidad.php';
require_once 'model/alumno.model.php';

require_once 'model/curso.entidad.php';
require_once 'model/curso.model.php';

class AlumnoController{
    
    private $alumno_model;
    private $curso_model;
    
    public function __CONSTRUCT()
    {
        $this->alumno_model = new AlumnoModel();
        $this->curso_model  = new CursoModel();
    }
    
    public function Index()
    {
        $alumnos = $this->alumno_model->Listar();
        
        require_once 'view/header.php';
        require_once 'view/alumno/index.php';
        require_once 'view/footer.php';
    }
    
    
    public function CursosPorAlumno()
    {
        header('Content-Type: application/json');
        
        $cursos = $this->curso_model->ListarCursosDeAlumno($_POST['id']);
        print_r( json_encode ( $cursos ) );
    }
}