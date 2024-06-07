-- -----------------------------------------------------
-- database
-- -----------------------------------------------------
CREATE DATABASE crud_sena;
USE crud_sena;
-- -----------------------------------------------------
-- Table usuarios
-- -----------------------------------------------------
create table Usuarios(
Id bigint not null primary key ,
Nombre varchar(50) not null,
Nombre_Usuario varchar(70) not null,
Pass varchar(200) not null,
Rol varchar(100)not null,
telefono bigint not null,
direccion varchar(100),
correo varchar(150)
);

-- -----------------------------------------------------
-- Table Registro`
-- -----------------------------------------------------

create table Registro(
IdRegistro int not null primary key,
Fecha date not null,
hora_Salida time not null,
Estado_Entrada varchar(45) not null,
Estado_Salida varchar(45) not null
);
-- -----------------------------------------------------
-- Table Bien`
-- -----------------------------------------------------

create table Bien(
IdBien int not null primary key auto_increment,
propi nvarchar(150),
Marca nvarchar(150) not null,
Referencia nvarchar(150)  not null,
Dispositivo nvarchar(150) not null

);
-- -----------------------------------------------------
-- Table Usuario Sena`
-- -----------------------------------------------------

create table Usuario_Sena(
CC int not null primary key,
Nombre varchar(100) not null,
Apellido varchar(100)not null,
Correo varchar(150)not null,
Telefono bigint not null,
Cargo varchar(150)not null
);
-- -----------------------------------------------------
-- Table Conectar Usuario Sena y Registro`
-- -----------------------------------------------------
create table Registro_has_Usuario_Sena(
Registro_IdRegistro int,
Usuario_Sena_TI_o_CC int
);
