<?php
//modelo de la tabla usuario
class Usuario
{
    public function __construct()
    {
        $this->conexion = new Base();
    }
    public function EmprendedorUsuarioCreado($documento)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT cedula FROM usuario WHERE cedula = :cedula";
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
    public function limpiarDatos($datos)
    {
        $datos = trim($datos);
        $datos = htmlspecialchars($datos);
        $datos = filter_var($datos, FILTER_SANITIZE_STRING);
        return $datos;
    }

    public function obtieneUsuarios()
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "INSERT INTO municipio VALUES (1,'zarzal','valle')";
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

    public function usuarioExiste($userForm, $passForm)
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT * FROM usuario WHERE usuario = :usuario AND clave = :clave AND estado = :estado";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":usuario", $userForm, PDO::PARAM_STR);
            $stmn->bindParam(":clave", $passForm, PDO::PARAM_STR);
            $stmn->bindParam(":estado", $estado, PDO::PARAM_STR);
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
            print $ex->getLine();
            $this->conexion->rollBack();
            return false;
        }
    }

    public function retornoID($usuario)
    {

        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT id_usuario FROM usuario WHERE usuario = :usuario and estado = :estado";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":usuario", $usuario, PDO::PARAM_STR);
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
    public function retornarPermiso($userID)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT rol_idrol FROM usuario WHERE id_usuario = :userID";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam( ":userID", $userID, PDO::PARAM_STR);
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

    public function ContadorUsuario()
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT count(id_usuario) + 1   FROM usuario ";
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

    public function usuarioCreado($usuario)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT usuario FROM usuario WHERE usuario = :usuario";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam( ":usuario", $usuario, PDO::PARAM_STR);
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

    public function InsertarUsuario(array $datos){
        try {
            $this->conexion->beginTransaction();
            $sql = "INSERT INTO usuario (id_usuario, usuario, clave, nombre, apellidos, direccion, correo, cedula, rol_idrol) 
            VALUES (:id_usuario, :usuario, :clave, :nombre, :apellidos, :direccion,:correo, :cedula, :rol_idrol)";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":id_usuario", $datos['id'], PDO::PARAM_STR);
            $stmn->bindParam(":usuario",$datos['usuario'], PDO::PARAM_STR);
            $stmn->bindParam(":clave",$datos['clave'], PDO::PARAM_STR);
            $stmn->bindParam(":nombre",$datos['nombre'], PDO::PARAM_STR);
            $stmn->bindParam(":apellidos",$datos['apellidos'], PDO::PARAM_STR);
            $stmn->bindParam(":direccion",$datos['direccion'], PDO::PARAM_STR);
            $stmn->bindParam(":cedula",$datos['cedula'], PDO::PARAM_STR);
            $stmn->bindParam(":correo",$datos['correo'], PDO::PARAM_STR);
            $stmn->bindParam(":rol_idrol",$datos['rol_idrol'], PDO::PARAM_STR);
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

    public function contrasenaExiste($usuario)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT clave FROM usuario WHERE usuario = :usuario";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam( ":usuario", $usuario, PDO::PARAM_STR);
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
    public function ActualizarUsuario(array $datos){
        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE usuario SET clave = :clave, nombre = :nombre, apellidos = :apellidos,
                   direccion = :direccion, correo = :correo  WHERE cedula = :cedula ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":clave",$datos['clave'], PDO::PARAM_STR);
            $stmn->bindParam(":nombre",$datos['nombre'], PDO::PARAM_STR);
            $stmn->bindParam(":apellidos",$datos['apellidos'], PDO::PARAM_STR);
            $stmn->bindParam(":direccion",$datos['direccion'], PDO::PARAM_STR);
            $stmn->bindParam(":correo",$datos['correo'], PDO::PARAM_STR);
            $stmn->bindParam(":cedula",$datos['cedula'], PDO::PARAM_STR);
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
    public function ActualizarUsuarioSinContraseña(array $datos){
        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE usuario SET  nombre = :nombre, apellidos = :apellidos,direccion = :direccion, correo = :correo 
                    WHERE cedula = :cedula ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":nombre",$datos['nombre'], PDO::PARAM_STR);
            $stmn->bindParam(":apellidos",$datos['apellidos'], PDO::PARAM_STR);
            $stmn->bindParam(":direccion",$datos['direccion'], PDO::PARAM_STR);
            $stmn->bindParam(":correo",$datos['correo'], PDO::PARAM_STR);
            $stmn->bindParam(":cedula",$datos['cedula'], PDO::PARAM_STR);
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
    public function ActualizarUsuarioCedula(array $datos){
        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE usuario SET clave = :clave,
            nombre = :nombre, apellidos = :apellidos, direccion = :direccion 
            WHERE cedula = :cedula";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":cedula", $datos['cedula'], PDO::PARAM_STR);
            $stmn->bindParam(":clave",$datos['clave'], PDO::PARAM_STR);
            $stmn->bindParam(":nombre",$datos['nombre'], PDO::PARAM_STR);
            $stmn->bindParam(":apellidos",$datos['apellidos'], PDO::PARAM_STR);
            $stmn->bindParam(":direccion",$datos['direccion'], PDO::PARAM_STR);
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
    public function ListarUsuario($usuario)
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT * FROM usuario WHERE estado = :estado ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam( ":estado", $estado, PDO::PARAM_STR);
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
    public function EliminarUsuario(array $datos){
        $estado = 1;
        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE usuario SET estado = :estado
            WHERE id_usuario = :id_usuario";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":estado",$estado, PDO::PARAM_STR);
            $stmn->bindParam(":direccion",$datos['direccion'], PDO::PARAM_STR);
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
    public function contrasenaActualizar($cedula)
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT clave FROM usuario WHERE cedula = :cedula AND estado = :estado";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam( ":cedula", $cedula, PDO::PARAM_STR);
            $stmn->bindParam( ":estado", $estado, PDO::PARAM_STR);
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
