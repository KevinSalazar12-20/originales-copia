<?php
class Emprendedor
{
    public function __construct()
    {
        $this->conexion = new Base();
    }
    public function EmprendedorCreado($documento)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT cedula FROM emprendedor WHERE cedula = :cedula";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam( ":cedula", $documento, PDO::PARAM_STR);
            $stmn->execute();
            $this->conexion->commit();
            return $stmn->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            print $ex->getMessage();
            print $ex->getCode();
            print_r($ex->getTrace());
            print $ex->getLine();
            $this->conexion->rollBack();
        }
    }


    public function InsertarEmprendedor(array $datos){
        try {
            $this->conexion->beginTransaction();
            $sql = "INSERT INTO emprendedor (cedula, nombre, apellidos, direccion, telefono, nombre_unidadp, descripcion_unidadp, logo, foto_personal, fecha_nacimiento, municipio_id_municipio) 
            VALUES (:cedula, :nombre, :apellidos, :direccion, :telefono, :nombre_unidadp,:descripcion_unidadp,:logo, :foto_personal ,:fecha_nacimiento, :municipio_id_municipio)";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":cedula", $datos['cedula'], PDO::PARAM_STR);
            $stmn->bindParam(":nombre",$datos['nombre'], PDO::PARAM_STR);
            $stmn->bindParam(":apellidos",$datos['apellidos'], PDO::PARAM_STR);
            $stmn->bindParam(":direccion",$datos['direccion'], PDO::PARAM_STR);
            $stmn->bindParam(":telefono",$datos['telefono'], PDO::PARAM_STR);
            $stmn->bindParam(":nombre_unidadp",$datos['nombre_unidadp'], PDO::PARAM_STR);
            $stmn->bindParam(":logo",$datos['logo'], PDO::PARAM_STR);
            $stmn->bindParam(":foto_personal",$datos['foto_personal'], PDO::PARAM_STR);
            $stmn->bindParam(":descripcion_unidadp",$datos['descripcion_unidadp'], PDO::PARAM_STR);
            $stmn->bindParam(":fecha_nacimiento",$datos['fecha_nacimiento'], PDO::PARAM_STR);
            $stmn->bindParam(":municipio_id_municipio",$datos['municipio'], PDO::PARAM_STR);
            $stmn->execute();
            $this->conexion->commit();
            if ($stmn->rowCount()) {
                return true;
            }else{
                return false;
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage();
            print $ex->getCode();
            print_r($ex->getTrace());
            print $ex->getLine();
            $this->conexion->rollBack();
            return array();
        }
    }
    public function ListadoEmprededor($cedula){
        $cedula = '%'. $cedula .'%';
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT * FROM emprendedor WHERE cedula LIKE :cedula  AND estado = :estado";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":cedula", $cedula, PDO::PARAM_STR);
            $stmn->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmn->execute();
            $this->conexion->commit();
            return $stmn->fetchAll(PDO::FETCH_OBJ);
        } catch (\PDOException $ex) {
            print $ex->getMessage();
            print $ex->getCode();
            print_r($ex->getTrace());
            print $ex->getLine();
            $this->conexion->rollBack();
            return array();
        }
    }
    public function EliminarEmprendedor($cedula){
        $estado = 1;
        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE emprendedor set estado = :estado WHERE cedula = :cedula ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmn->bindParam(":cedula", $cedula, PDO::PARAM_STR);
            $stmn->execute();
            $this->conexion->commit();
            if($stmn->rowCount()){
                return true;
            }else{
                return false;
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage();
            print $ex->getCode();
            print_r($ex->getTrace());
            print $ex->getLine();
            $this->conexion->rollBack();
            return array();
        }
    }
    public function MostrarEmprendedor($cedula){
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT usuario.id_usuario, usuario.usuario, usuario.clave, usuario.correo,emprendedor.cedula
            , emprendedor.nombre,emprendedor.apellidos, emprendedor.direccion, emprendedor.nombre_unidadp, emprendedor.descripcion_unidadp,
            emprendedor.logo, emprendedor.foto_personal, emprendedor.fecha_nacimiento, emprendedor.municipio_id_municipio , emprendedor.telefono
            FROM emprendedor INNER JOIN usuario ON usuario.cedula = emprendedor.cedula
            WHERE emprendedor.cedula = :cedula  AND emprendedor.estado = :estado";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":cedula", $cedula, PDO::PARAM_STR);
            $stmn->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmn->execute();
            $this->conexion->commit();
            return $stmn->fetchAll(PDO::FETCH_OBJ);
        } catch (\PDOException $ex) {
            print $ex->getMessage();
            print $ex->getCode();
            print_r($ex->getTrace());
            print $ex->getLine();
            $this->conexion->rollBack();
            return array();
        }
    }
    public function ActualizarEmprendedor(array $datos){
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE emprendedor SET nombre = :nombre, apellidos = :apellidos, direccion = :direccion,
                    telefono = :telefono, nombre_unidadp = :nombre_unidadp,descripcion_unidadp = :descripcion_unidadp ,
                    fecha_nacimiento = :fecha_nacimiento, municipio_id_municipio = :municipio_id_municipio  WHERE cedula = :cedula";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":cedula", $datos['cedula'], PDO::PARAM_STR);
            $stmn->bindParam(":nombre",$datos['nombre'], PDO::PARAM_STR);
            $stmn->bindParam(":apellidos",$datos['apellidos'], PDO::PARAM_STR);
            $stmn->bindParam(":direccion",$datos['direccion'], PDO::PARAM_STR);
            $stmn->bindParam(":telefono",$datos['telefono'], PDO::PARAM_STR);
            $stmn->bindParam(":nombre_unidadp",$datos['nombre_unidadp'], PDO::PARAM_STR);
            $stmn->bindParam(":descripcion_unidadp",$datos['descripcion_unidadp'], PDO::PARAM_STR);
            $stmn->bindParam(":fecha_nacimiento",$datos['fecha_nacimiento'], PDO::PARAM_STR);
            $stmn->bindParam(":municipio_id_municipio",$datos['municipio'], PDO::PARAM_STR);
            $stmn->execute();
            $this->conexion->commit();
            if ($stmn->rowCount()) {
                return true;
            }else{
                return false;
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage();
            print $ex->getCode();
            print_r($ex->getTrace());
            print $ex->getLine();
            $this->conexion->rollBack();
            return array();
        }
    }

}