<?php
//modelo de la tabla Rol
class Rol
{
    private $id_rol;
    private $nombre;
    private $descripcion;
    public function __construct()
    {
        $this->conexion = new Base();
    }
    public function InsertarPersona(array $datos): bool
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "INSERT INTO persona (persona_identidad, persona_nombre, persona_apellido, persona_dirrecion, persona_telefono) 
            VALUES (:identidad, :nombre, :apellido, :dirrecion,:telefono)";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(':identidad', $datos['persona_identidad'], PDO::PARAM_STR);
            $stmn->bindParam(':nombre', $datos['persona_nombre'], PDO::PARAM_STR);
            $stmn->bindParam(':apellido', $datos['persona_apellido'], PDO::PARAM_STR);
            $stmn->bindParam(':dirrecion', $datos['persona_dirrecion'], PDO::PARAM_STR);
            $stmn->bindParam(':telefono', $datos['persona_telefono'], PDO::PARAM_STR);
            $stmn->execute();
            $this->conexion->commit();
            if ($stmn->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage();
            print $ex->getCode();
            print_r($ex->getTrace());
            print $ex->getFile();
            $this->conexion->rollBack();
            return false;
        }
    }
    /*-------------------------------------------------------------------------------------------*/
}