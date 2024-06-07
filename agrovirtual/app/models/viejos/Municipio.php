<?php
//clase para gestinar  los municipios
class Municipio
{
    private $id_municipio;
    private $nombre;
    private $departamento;

    public function __construct()
    {
        $this->conexion = new Base();
    }

    public function InsertarMunicipio(array $datos)
    {

        try {
            $this->conexion->beginTransaction();
            $sql = "INSERT INTO municipio (id_municipio, nombre, departamento) 
            VALUES (:id_municipio, :nombre, :departamento)";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":id_municipio", $datos['id_municipio'], PDO::PARAM_STR);
            $stmn->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
            $stmn->bindParam(":departamento",$datos['departamento'], PDO::PARAM_STR);
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

    public function ContadorMunicipio()
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT count(id_municipio) + 1   FROM municipio ";
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

    public function ListarMunicipio()
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT * FROM municipio ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->execute();
            $this->conexion->commit();
            return $stmn->fetchAll();
        } catch (PDOException $ex) {
            print $ex->getMessage();
            print $ex->getCode();
            print_r($ex->getTrace());
            print $ex->getFile();
            $this->conexion->rollBack();
            return array();
        }
    }
    public function MostrarMunicipio()
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT id_municipio,nombre,departamento FROM municipio WHERE estado = :estado ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmn->execute();
            $this->conexion->commit();
            return $stmn->fetchAll();
        } catch (PDOException $ex) {
            print $ex->getMessage();
            print $ex->getCode();
            print_r($ex->getTrace());
            print $ex->getFile();
            $this->conexion->rollBack();
            return array();
        }
    }

    public function  ActualizarMunicipio(array $datos){

        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE municipio SET nombre = :nombre, departamento = :departamento WHERE id_municipio = :id_municipio";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":id_municipio", $datos['id_municipio'], PDO::PARAM_STR);
            $stmn->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
            $stmn->bindParam(":departamento",$datos ['departamento'], PDO::PARAM_STR);
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
            $sql = "select * from municipio where nombre like :nombre  AND estado = :estado";
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

    public function  RespuestaMunicipio($dato){
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT * FROM municipio WHERE id_municipio = :id_municipio AND estado = :estado ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":id_municipio", $dato, PDO::PARAM_STR);
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


    public function  EliminarMunicipio(array $datos){

        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE municipio SET estado = :estado WHERE id_municipio = :id_municipio";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":id_municipio", $datos['id'], PDO::PARAM_STR);
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