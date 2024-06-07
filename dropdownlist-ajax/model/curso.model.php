<?php
class CursoModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
            require_once 'model/database.php';            
			$this->pdo = DataBase::ObtenerConexion();
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListarCursosDeAlumno($id)
	{
		try
		{
            $sql = " select c.* from cursos c
            inner join alumno_curso ac on ac.curso_id = c.id
            inner join alumnos a on a.id = ac.Alumno_id
            WHERE a.id = :id order by a.Nombre, c.Nombre ";

			$stm = $this->pdo->prepare($sql);
			$stm->execute(array(':id' => $id));
            
            return $stm->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}