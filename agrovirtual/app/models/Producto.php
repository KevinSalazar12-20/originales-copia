<?php
class Producto
{
    public function __construct()
    {
        $this->conexion = new Base();
    }
    public function ContadorProducto()
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT count(cod_producto) + 1   FROM producto ";
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

    public function Archivo($cedula)
    {
        $estado = 0;
        try {

            $this->conexion->beginTransaction();
            $sql = "SELECT count(cod_producto) + 1 FROM producto WHERE emprendedor_cedula = :cedula and estado = :estado";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmn->bindParam(':cedula', $cedula, PDO::PARAM_STR);
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

    public function InsertarProducto(array $datos)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "INSERT INTO producto (cod_producto,producto,promocion_cod_descuento,emprendedor_cedula,categorias_id_categorias,estado ) 
            VALUES  (:cod_producto,:producto,:promocion_cod_descuento,:emprendedor_cedula,:categorias_id_categorias,:estado)";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(':cod_producto', $datos['cod_producto'], PDO::PARAM_STR);
            $stmn->bindParam(':producto', $datos['producto'], PDO::PARAM_STR);
            $stmn->bindParam(':promocion_cod_descuento', $datos['promocion_cod_descuento'], PDO::PARAM_STR);
            $stmn->bindParam(':emprendedor_cedula', $datos['emprendedor_cedula'], PDO::PARAM_STR);
            $stmn->bindParam(':categorias_id_categorias', $datos['categorias_id_categorias'], PDO::PARAM_STR);
            $stmn->bindParam(':estado', $datos['estado'], PDO::PARAM_STR);
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
    public function ActualizarProducto(array $datos)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE producto SET producto = :producto , categorias_id_categorias = :categorias_id_categorias 
                    WHERE  cod_producto = :cod_producto";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(':cod_producto', $datos['cod_producto'], PDO::PARAM_STR);
            $stmn->bindParam(':producto', $datos['producto'], PDO::PARAM_STR);
            $stmn->bindParam(':categorias_id_categorias', $datos['categorias_id_categorias'], PDO::PARAM_STR);
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

    public function ListarProducto()
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT * FROM producto  WHERE estado = :estado";
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
    public function ListarProductoSelecionados( array $datos)
    {
        $estado = 0;
        $final = 6;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT producto.cod_producto,producto.producto,producto.emprendedor_cedula,ficha_comercial.fotografia,ficha_comercial.descripcion,ficha_comercial.precio FROM producto  
                    INNER JOIN ficha_comercial ON producto.cod_producto = ficha_comercial.id_fichacomercial WHERE estado = :estado  LIMIT :inicio,:final";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":inicio", $datos['inicio'], PDO::PARAM_STR);
            $stmn->bindParam(":final", $final, PDO::PARAM_STR);
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
    public function ListarProductosCategoria( array $data)
    {
        $final = 6;
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT producto.cod_producto, 
            producto.producto, producto.promocion_cod_descuento,producto.emprendedor_cedula,
            producto.categorias_id_categorias,ficha_comercial.fotografia,ficha_comercial.precio FROM producto INNER JOIN ficha_comercial ON ficha_comercial.id_fichacomercial = producto.cod_producto  WHERE producto.estado = :estado AND  producto.categorias_id_categorias = :categorias  LIMIT :inicio,:final ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":inicio", $data['inicio'], PDO::PARAM_STR);
            $stmn->bindParam(":final", $final, PDO::PARAM_STR);
            $stmn->bindParam(":categorias",$data['categorias'] , PDO::PARAM_STR);
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
    public function ContarProductosCategorias($id)
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT count(cod_producto) FROM producto WHERE estado = :estado AND  categorias_id_categorias = :categorias ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":categorias", $id, PDO::PARAM_STR);
            $stmn->bindParam(":estado", $estado, PDO::PARAM_STR);
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

    public function ContarProductosMunicipios($id)
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT count(producto.cod_producto)
            FROM producto 
            INNER JOIN emprendedor ON producto.emprendedor_cedula = emprendedor.cedula 
            WHERE emprendedor.municipio_id_municipio = :municipio AND producto.estado = :estado
  ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":municipio", $id, PDO::PARAM_STR);
            $stmn->bindParam(":estado", $estado, PDO::PARAM_STR);
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
    public function ListarProductosMunicipios( array $data)
    {
        $final = 6;
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT  producto.cod_producto, 
            producto.producto, producto.promocion_cod_descuento,producto.emprendedor_cedula,
            producto.categorias_id_categorias,ficha_comercial.fotografia,ficha_comercial.precio
            FROM producto 
            INNER JOIN emprendedor ON producto.emprendedor_cedula = emprendedor.cedula 
            INNER JOIN  ficha_comercial ON ficha_comercial.producto_cod_producto = producto.cod_producto
            WHERE emprendedor.municipio_id_municipio = :municipios AND producto.estado = :estado
            LIMIT :inicio,:final";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":inicio", $data['inicio'], PDO::PARAM_STR);
            $stmn->bindParam(":final", $final, PDO::PARAM_STR);
            $stmn->bindParam(":municipios",$data['municipios'] , PDO::PARAM_STR);
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
    public function ListarProductosMostrar()
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT  *
            FROM producto 
            INNER JOIN emprendedor ON producto.emprendedor_cedula = emprendedor.cedula 
            WHERE producto.cod_producto = :id AND producto.estado = :estado";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":id", $id, PDO::PARAM_STR);
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
    public function ListarProductosEmprendedor($cedula)
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT * FROM producto  INNER JOIN ficha_comercial ON ficha_comercial.producto_cod_producto = producto.cod_producto  WHERE emprendedor_cedula = :cedula  AND estado = :estado";
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
        }
    }
    public function ListarProductoReferencia($cod_producto)
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT producto,categorias_id_categorias FROM producto WHERE cod_producto = :cod_producto AND estado = :estado";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":cod_producto", $cod_producto, PDO::PARAM_STR);
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

}
