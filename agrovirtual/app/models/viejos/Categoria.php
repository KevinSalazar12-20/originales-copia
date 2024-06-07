<?php
class Categoria
{
    public function __construct()
    {
        $this->conexion = new Base();
    }
    public function ContadorCategoria()
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT count(id_categoria) + 1   FROM categoria ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->execute();
            $this->conexion->commit();
            return $stmn->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            print $ex->getMessage();
            print $ex->getCode();
            print_r($ex->getTrace());
            print $ex->getFile();
            $this->conexion->rollBack();
            return array();
        }
    }

    public function InsertarCategoria(array $datos){
        try {
            $this->conexion->beginTransaction();
            $sql = "INSERT INTO categoria (id_categoria, nombre, descripcion)
            VALUES (:id_categoria, :nombre, :descripcion)";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":id_categoria", $datos['id_categoria'], PDO::PARAM_STR);
            $stmn->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
            $stmn->bindParam(":descripcion",$datos['descripcion'], PDO::PARAM_STR);
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

    public function ListarCategoria()
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT * FROM categoria WHERE estado = :estado";
            $stmn = $this->conexion->prepare($sql);
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
        }
    }

    public function  ActualizarCategoria(array $datos){

        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE categoria SET nombre = :nombre, descripcion = :descripcion WHERE id_categoria = :id_categoria";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":id_categoria", $datos['id_categoria'], PDO::PARAM_STR);
            $stmn->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
            $stmn->bindParam(":descripcion",$datos ['descripcion'], PDO::PARAM_STR);
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

    public function  BuscadorCategoria($dato){
        $estado = 0;
        $nombre = '%'. $dato .'%';
        try {
            $this->conexion->beginTransaction();
            $sql = "select * from categoria where nombre like :nombre  AND estado = :estado";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":nombre", $nombre, PDO::PARAM_STR);
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

    public function  RespuestaCategoria($dato){
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT * FROM categoria WHERE id_categoria = :id_categoria AND estado = :estado ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":id_categoria", $dato, PDO::PARAM_STR);
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

    public function  EliminarCategoria(array $datos){

        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE categoria SET estado = :estado WHERE id_categoria = :id_categoria";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":id_categoria", $datos['id'], PDO::PARAM_STR);
            $stmn->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
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
