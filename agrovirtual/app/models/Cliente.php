<?php
class Cliente
{
    public function __construct()
    {
        $this->conexion = new Base();
    }

    public function InsertarCliente(array $datos){
        try {
            $this->conexion->beginTransaction();
            $sql = "INSERT INTO cliente (cedula, nombre, apellidos, direccion, telefono) 
            VALUES (:cedula, :nombre, :apellidos, :direccion, :telefono)";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":cedula", $datos['cedula'], PDO::PARAM_STR);
            $stmn->bindParam(":nombre",$datos['nombre'], PDO::PARAM_STR);
            $stmn->bindParam(":apellidos",$datos['apellidos'], PDO::PARAM_STR);
            $stmn->bindParam(":direccion",$datos['direccion'], PDO::PARAM_STR);
            $stmn->bindParam(":telefono",$datos['telefono'], PDO::PARAM_STR);
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

    public function clienteCreado($usuario)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT cedula FROM cliente WHERE cedula = :cedula";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam( ":cedula", $cedula, PDO::PARAM_STR);
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
}