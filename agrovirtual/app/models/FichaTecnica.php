<?php
class FichaTecnica
{
    public function __construct()
    {
        $this->conexion = new Base();
    }
    public function InsertarFichaTecnica(array $datos)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "INSERT INTO ficha_tecnica (id_fichatecnica, nombre, tipo_presentacion, contenido_presentacion
            , tipos_presentaciones, costo, nombre_producto, volumen_produccion, variedad_producto, nombre_cientifico,
            temperatura_requerida_envio, ntc_relacionada, normas_vinculadas, lotes_promocion, caracteristicas_propias,
            telefono1, telefono2, direccion, producto_cod_producto ) VALUES 
            (:id_fichatecnica, :nombre, :tipo_presentacion, :contenido_presentacion
            , :tipos_presentaciones, :costo, :nombre_producto, :volumen_produccion, :variedad_producto, :nombre_cientifico,
            :temperatura_requerida_envio, :ntc_relacionada, :normas_vinculadas, :lotes_promocion, :caracteristicas_propias,
            :telefono1, :telefono2, :direccion, :producto_cod_producto) ";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(':id_fichatecnica', $datos['cod_producto'], PDO::PARAM_STR);
            $stmn->bindParam(':nombre', $datos['producto'], PDO::PARAM_STR);
            $stmn->bindParam(':tipo_presentacion', $datos['tipo_presentacion'], PDO::PARAM_STR);
            $stmn->bindParam(':contenido_presentacion', $datos['contenido_presentacion'], PDO::PARAM_STR);
            $stmn->bindParam(':tipos_presentaciones', $datos['tipos_presentacion'], PDO::PARAM_STR);
            $stmn->bindParam(':costo', $datos['costo'], PDO::PARAM_STR);
            $stmn->bindParam(':nombre_producto', $datos['nombre_producto'], PDO::PARAM_STR);
            $stmn->bindParam(':volumen_produccion', $datos['volumen_produccion'], PDO::PARAM_STR);
            $stmn->bindParam(':variedad_producto', $datos['variedad_producto'], PDO::PARAM_STR);
            $stmn->bindParam(':nombre_cientifico', $datos['nombre_cientifico'], PDO::PARAM_STR);
            $stmn->bindParam(':temperatura_requerida_envio', $datos['temperatura_requerida_envio'], PDO::PARAM_STR);
            $stmn->bindParam(':ntc_relacionada', $datos['Ntc_relacionada'], PDO::PARAM_STR);
            $stmn->bindParam(':normas_vinculadas', $datos['normas_vinculadas'], PDO::PARAM_STR);
            $stmn->bindParam(':lotes_promocion', $datos['lotes_promocion'], PDO::PARAM_STR);
            $stmn->bindParam(':caracteristicas_propias', $datos['caracteristicas_propias'], PDO::PARAM_STR);
            $stmn->bindParam(':telefono1', $datos['telefono1'], PDO::PARAM_STR);
            $stmn->bindParam(':telefono2', $datos['telefono2'], PDO::PARAM_STR);
            $stmn->bindParam(':direccion', $datos['direccion'], PDO::PARAM_STR);
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
    public function ListarFichaTecnica()
    {

        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT  *
            FROM ficha_tecnica WHERE id_fichatecnica = id"
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
    public function MostrarActualizarFichaTecnica($cod_producto)
    {
        $estado = 0;
        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT producto.cod_producto, producto.producto,producto.emprendedor_cedula,producto.fotografia,
                    ficha_tecnica.id_fichatecnica,ficha_tecnica.nombre, ficha_tecnica.descripcion, 
                    ficha_tecnica.tipo_presentacion, ficha_tecnica.contenido_presentacion, ficha_tecnica.tipos_presentaciones, 
                    ficha_tecnica.costo,ficha_tecnica.nombre_producto, ficha_tecnica.volumen_produccion, 
                    ficha_tecnica.variedad_producto, ficha_tecnica.nombre_cientifico, ficha_tecnica.temperatura_requerida_envio,
                     ficha_tecnica.ntc_relacionada, ficha_tecnica.normas_vinculadas, ficha_tecnica.lotes_promocion, 
                     ficha_tecnica.caracteristicas_propias, ficha_tecnica.telefono1, ficha_tecnica.telefono2, 
                     ficha_tecnica.direccion 
                     FROM ficha_tecnica
                    INNER JOIN producto ON producto.cod_producto = :cod_producto WHERE producto.estado = :estado  "
            ;
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

    public function ActualizarFichaTecnica(array $datos)
    {
        try {
            $this->conexion->beginTransaction();
            $sql = "UPDATE ficha_tecnica SET nombre = :nombre, tipo_presentacion = :tipo_presentacion, 
                    contenido_presentacion = :contenido_presentacion, tipos_presentaciones = :tipos_presentaciones, 
                         costo = :costo , nombre_producto = :nombre_producto, volumen_produccion = :volumen_produccion, 
                         variedad_producto = :variedad_producto, nombre_cientifico = :nombre_cientifico,
                        temperatura_requerida_envio = :temperatura_requerida_envio, ntc_relacionada = :ntc_relacionada,
                         normas_vinculadas = :normas_vinculadas, lotes_promocion = :lotes_promocion,
                         caracteristicas_propias = :caracteristicas_propias,telefono1 = :telefono1, telefono2 = :telefono2,
                         direccion = :direccion WHERE id_fichatecnica = :id_fichatecnica";
            $stmn = $this->conexion->prepare($sql);
            $stmn->bindParam(':id_fichatecnica', $datos['cod_producto'], PDO::PARAM_STR);
            $stmn->bindParam(':nombre', $datos['producto'], PDO::PARAM_STR);
            $stmn->bindParam(':tipo_presentacion', $datos['tipo_presentacion'], PDO::PARAM_STR);
            $stmn->bindParam(':contenido_presentacion', $datos['contenido_presentacion'], PDO::PARAM_STR);
            $stmn->bindParam(':tipos_presentaciones', $datos['tipos_presentacion'], PDO::PARAM_STR);
            $stmn->bindParam(':costo', $datos['costo'], PDO::PARAM_STR);
            $stmn->bindParam(':nombre_producto', $datos['nombre_producto'], PDO::PARAM_STR);
            $stmn->bindParam(':volumen_produccion', $datos['volumen_produccion'], PDO::PARAM_STR);
            $stmn->bindParam(':variedad_producto', $datos['variedad_producto'], PDO::PARAM_STR);
            $stmn->bindParam(':nombre_cientifico', $datos['nombre_cientifico'], PDO::PARAM_STR);
            $stmn->bindParam(':temperatura_requerida_envio', $datos['temperatura_requerida_envio'], PDO::PARAM_STR);
            $stmn->bindParam(':ntc_relacionada', $datos['Ntc_relacionada'], PDO::PARAM_STR);
            $stmn->bindParam(':normas_vinculadas', $datos['normas_vinculadas'], PDO::PARAM_STR);
            $stmn->bindParam(':lotes_promocion', $datos['lotes_promocion'], PDO::PARAM_STR);
            $stmn->bindParam(':caracteristicas_propias', $datos['caracteristicas_propias'], PDO::PARAM_STR);
            $stmn->bindParam(':telefono1', $datos['telefono1'], PDO::PARAM_STR);
            $stmn->bindParam(':telefono2', $datos['telefono2'], PDO::PARAM_STR);
            $stmn->bindParam(':direccion', $datos['direccion'], PDO::PARAM_STR);
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
    public function ListarFichaTecnicaReferenciada($id)
    {

        try {
            $this->conexion->beginTransaction();
            $sql = "SELECT  * FROM ficha_tecnica WHERE id_fichatecnica = :id"
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
}