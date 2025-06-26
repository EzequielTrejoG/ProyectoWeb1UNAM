CREATE DATABASE IF NOT EXISTS Gastos;

CREATE TABLE IF NOT EXISTS departamentos(
    idDepartamento INT NOT NULL AUTO_INCREMENT,
    Descripcion VARCHAR(100) NOT NULL,
    Activo TINYINT NOT NULL DEFAULT 1,
    fechaCreacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    fechaActualizacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    idEmpleado INT NULL DEFAULT 1,
    PRIMARY KEY (idDepartamento)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS categorias(
    idCategoria INT NOT NULL AUTO_INCREMENT,
    Descripcion VARCHAR(100) NOT NULL,
    Activo TINYINT NOT NULL DEFAULT 1,
    fechaCreacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    fechaActualizacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    idEmpleado INT NULL DEFAULT 1,
    PRIMARY KEY (idCategoria)
)ENGINE = InnoDB;

CREATE TABLE empleados(
    idEmpleado INT NOT NULL AUTO_INCREMENT,
    Nombre TEXT NOT NULL,
    primerApellido TEXT NOT NULL,
    segundoApellido TEXT NULL,
    email VARCHAR(100) NOT NULL,
    fechaEntrada DATETIME NOT NULL,
    fechaBaja DATETIME NULL,
    idDepartamento INT NOT NULL,
    idJefe INT NULL,
    esJefe TINYINT NULL DEFAULT 0,
    Usuario VARCHAR(100) NOT NULL,
    Password VARCHAR(256) NOT NULL,
    Foto VARCHAR(100) NULL,
    Activo TINYINT NOT NULL DEFAULT 1,
    fechaCreacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    fechaActualizacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    idEmpActualiza INT(11) NULL DEFAULT '1',
    PRIMARY KEY(idEmpleado),
    UNIQUE INDEX idEmpleado_UNIQUE(idEmpleado ASC),
    INDEX fk_empleados_departamentos_idx (idDepartamento ASC),
    CONSTRAINT fk_empleados_departamentos
        FOREIGN KEY (idDepartamento)
        REFERENCES departamentos(idDepartamento)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
)ENGINE = InnoDB;