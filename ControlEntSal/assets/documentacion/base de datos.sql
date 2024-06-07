
-- -----------------------------------------------------
-- database
-- -----------------------------------------------------
CREATE database tiendapedro ;
USE tiendapedro;

-- -----------------------------------------------------
-- Table cliente`
-- -----------------------------------------------------
CREATE TABLE cliente (
  `id_cliente` INT NOT NULL,
  `nombre_cliente` VARCHAR(45) NOT NULL,
  `telefono_cliente` INT(10) NOT NULL,
  `direccion_cliente` VARCHAR(45) NULL,
  `email_cliente` VARCHAR(45) NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Factura_Venta`
-- -----------------------------------------------------
CREATE TABLE Factura_Venta (
  `num_factura_venta` INT NOT NULL AUTO_INCREMENT,
  `fecha_factura_venta` VARCHAR(45) NOT NULL,
  `id_cliente` INT NOT NULL,
  `cliente_id_cliente` INT NOT NULL,
  PRIMARY KEY (`num_factura_venta`),
  CONSTRAINT `fk_Factura_Venta_cliente1`
    FOREIGN KEY (`cliente_id_cliente`)
    REFERENCES cliente (`id_cliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table categoria`
-- -----------------------------------------------------
CREATE TABLE  categoria (
  `idcategoria` INT NOT NULL,
  `descripcion` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Producto`
-- -----------------------------------------------------
CREATE TABLE  Producto (
  `id_producto` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `precio` INT NOT NULL,
  `stock` INT NULL,
  `categoria_idcategoria` INT NOT NULL,
  PRIMARY KEY (`id_producto`),
  CONSTRAINT `fk_Producto_categoria1`
    FOREIGN KEY (`categoria_idcategoria`)
    REFERENCES categoria(`idcategoria`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Detalle_Venta`
-- -----------------------------------------------------
CREATE TABLE  Detalle_Venta (
  `num_detalle` INT NOT NULL,
  `id_producto` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `precio` INT NULL,
  `Factura_Venta_num_factura_venta` INT NOT NULL,
  `Producto_id_producto` INT NOT NULL,
  PRIMARY KEY (`num_detalle`),
  CONSTRAINT `fk_Detalle_Venta_Factura_Venta1`
    FOREIGN KEY (`Factura_Venta_num_factura_venta`)
    REFERENCES Factura_Venta(`num_factura_venta`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Detalle_Venta_Producto1`
    FOREIGN KEY (`Producto_id_producto`)
    REFERENCES Producto (`id_producto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table usuario`
-- -----------------------------------------------------
CREATE TABLE usuario (
  `idusuario` INT NOT NULL,
  `usuario` VARCHAR(100) NULL,
  `usuarionombre` VARCHAR(100) NULL,
  `usuarioapellido` VARCHAR(100) NULL,
  `usuariopassword` VARCHAR(100) NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rol`
-- -----------------------------------------------------
CREATE TABLE rol (
  `idrol` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idrol`),
  CONSTRAINT `fk_rol_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES usuario (`idusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

