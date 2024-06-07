<?php
class FichaComercial
{
    public function __construct()
    {
        $this->conexion = new Base();
    }
    public function InsertarFichaComercial(array $datos)
    {
        
        try {
            $this->conexion->beginTransaction();
            $sql = "INSERT INTO ficha_comercial (id_fichacomercial, nombre_producto, nombre_contacto, direccion, telefono1, telefono2, 
                             caracteristicas_producto, unidad_medida ,peso, precio, Ingredientes, descripcion, fotografia, foto1, foto2,
                             foto3, foto4 , producto_cod_producto) 
            VALUES  (:id_fichacomercial, :nombre_producto, :nombre_contacto, :direccion, :telefono1, :telefono2, 
                             :caracteristicas_producto, :unidad_medida ,:peso, :precio, :Ingredientes, :descripcion, :fotografia,:foto1, :foto2,
                             :foto3, :foto4 , :producto_cod_producto)";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(':id_fichacomercial', $datos['cod_producto'], PDO::PARAM_STR);
            $stmn->bindParam(':nombre_producto', $datos['producto'], PDO::PARAM_STR);
            $stmn->bindParam(':nombre_contacto', $datos['nombre_contacto'], PDO::PARAM_STR);
            $stmn->bindParam(':direccion', $datos['direccion'], PDO::PARAM_STR);
            $stmn->bindParam(':telefono1', $datos['telefono1'], PDO::PARAM_STR);
            $stmn->bindParam(':telefono2', $datos['telefono2'], PDO::PARAM_STR);
            $stmn->bindParam(':caracteristicas_producto', $datos['caracteristicas_producto'], PDO::PARAM_STR);
            $stmn->bindParam(':unidad_medida', $datos['unidad_medida'], PDO::PARAM_STR);
            $stmn->bindParam(':peso', $datos['producto_peso'], PDO::PARAM_STR);
            $stmn->bindParam(':precio', $datos['producto_precio'], PDO::PARAM_STR);
            $stmn->bindParam(':Ingredientes', $datos['producto_ingredientes'], PDO::PARAM_STR);
            $stmn->bindParam(':descripcion', $datos['producto_descripcion'], PDO::PARAM_STR);
            $stmn->bindParam(':fotografia', $datos['fotografia'], PDO::PARAM_STR);
            $stmn->bindParam(':foto1', $datos['foto1'], PDO::PARAM_STR);
            $stmn->bindParam(':foto2', $datos['foto2'], PDO::PARAM_STR);
            $stmn->bindParam(':foto3', $datos['foto3'], PDO::PARAM_STR);
            $stmn->bindParam(':foto4', $datos['foto4'], PDO::PARAM_STR);
            $stmn->bindParam(':producto_cod_producto', $datos['cod_producto'], PDO::PARAM_STR);
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

    public function ActualizarFichaComercial(array $datos)
    {

        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE ficha_comercial SET nombre_producto = :nombre_producto, nombre_contacto = :nombre_contacto,
                    direccion = :direccion, telefono1 = :telefono1, telefono2 = :telefono2, caracteristicas_producto = 
                    :caracteristicas_producto, unidad_medida = :unidad_medida, peso = :peso, precio = :precio,
                    Ingredientes = producto_ingredientes, descripcion = :descripcion, fotografia = :fotografia,
                    foto1 = :foto1, foto2 = :foto2,foto3 = :foto3,foto4 = :foto4 WHERE id_fichacomercial = :id_fichacomercial";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(':id_fichacomercial', $datos['cod_producto'], PDO::PARAM_STR);
            $stmn->bindParam(':nombre_producto', $datos['producto'], PDO::PARAM_STR);
            $stmn->bindParam(':nombre_contacto', $datos['nombre_contacto'], PDO::PARAM_STR);
            $stmn->bindParam(':direccion', $datos['direccion'], PDO::PARAM_STR);
            $stmn->bindParam(':telefono1', $datos['telefono1'], PDO::PARAM_STR);
            $stmn->bindParam(':telefono2', $datos['telefono2'], PDO::PARAM_STR);
            $stmn->bindParam(':caracteristicas_producto', $datos['caracteristicas_producto'], PDO::PARAM_STR);
            $stmn->bindParam(':unidad_medida', $datos['unidad_medida'], PDO::PARAM_STR);
            $stmn->bindParam(':peso', $datos['producto_peso'], PDO::PARAM_STR);
            $stmn->bindParam(':precio', $datos['producto_precio'], PDO::PARAM_STR);
            $stmn->bindParam(':Ingredientes', $datos['producto_ingredientes'], PDO::PARAM_STR);
            $stmn->bindParam(':descripcion', $datos['producto_descripcion'], PDO::PARAM_STR);
            $stmn->bindParam(':fotografia', $datos['fotografia'], PDO::PARAM_STR);
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
    public function ListarFichaComercial()
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT  *
            FROM ficha_comercial WHERE id_fichacomercial = id "
            ;
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":id", $id, PDO::PARAM_STR);
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
    public function MostrarActualizarFichaComercial($cod_producto)
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT producto.producto, producto.emprendedor_cedula, producto.categorias_id_categorias,
                    ficha_comercial.nombre_producto, ficha_comercial.nombre_contacto, ficha_comercial.direccion ,
                    ficha_comercial.telefono1, ficha_comercial.telefono2, ficha_comercial.caracteristicas_producto,
                    ficha_comercial.peso, ficha_comercial.precio, ficha_comercial.Ingredientes, ficha_comercial.descripcion,
                    ficha_comercial.fotografia, ficha_comercial.foto1, ficha_comercial.foto2, ficha_comercial.foto3, ficha_comercial.foto4, 
                    ficha_comercial.unidad_medida FROM ficha_comercial INNER JOIN producto ON producto.cod_producto = :cod_producto WHERE producto.estado = :estado";
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

    public function ListarFichaComercialReferencia($cod_producto)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT nombre,precio_libra,descripcion FROM ficha_comercial WHERE id_fichacomercial = :cod_producto ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":cod_producto", $cod_producto, PDO::PARAM_STR);
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
    public function ListarProductoFotografia($cod_producto)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT fotografia FROM ficha_comercial WHERE id_fichacomercial = :cod_producto";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":cod_producto", $cod_producto, PDO::PARAM_STR);
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
    public function ImprimirProductoModal($cod_producto)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT * FROM ficha_comercial INNER JOIN producto ON producto.cod_producto = ficha_comercial.id_fichacomercial 
                    INNER JOIN  emprendedor ON producto.emprendedor_cedula = emprendedor.cedula
            WHERE producto.cod_producto = :cod_producto";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(":cod_producto", $cod_producto, PDO::PARAM_STR);
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
