<?php
// Ruta del proyecto, cambiala por la ruta que vas a usar
define( 'RUTA_HTTP', 'http://' . $_SERVER['HTTP_HOST'] . '/tutoriales/dropdownlist-ajax/' );

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c'])){
    require_once 'controller/alumno.controller.php';
    $controller = new AlumnoController();
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = $_REQUEST['c'] . 'Controller';
    $accion     = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    // Instanciamos el controlador
    require_once 'controller/' . strtolower($_REQUEST['c']) . '.controller.php';
    $controller = new $controller();
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}