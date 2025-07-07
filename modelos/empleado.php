<?php

    require "../config/conexion.php";
    

    Class Empleado
    {
        public function __construct(){

        }
    
        public function insertar($Nombre, $primerApellido, $segundoApellido, $email, $fechaEntrada, $fechaBaja, $idDepartamento, $idJefe, $esJefe, 
        $Usuario, $Password, $Foto, $idEmpActualiza){
            $sql = "INSERT INTO empleados(Nombre, primerApellido, segundoApellido, email, fechaEntrada, fechaBaja, idDepartamento, idJefe, 
            esJefe, Usuario, Password, Foto, idEmpActualiza) VALUES('$Nombre', '$primerApellido', '$segundoApellido', '$email', '$fechaEntrada', 
            '$fechaBaja', '$idDepartamento', '$idJefe', '$esJefe', '$Usuario', '$Password', '$Foto', '$idEmpActualiza')";
            return ejecutarConsultaRetornaID($sql);
        }

        public function editar($idEmpleado, $Nombre, $primerApellido, $segundoApellido, $email, $fechaEntrada, $fechaBaja, $idDepartamento, 
        $idJefe, $esJefe, $Usuario, $Password, $Foto, $fechaActualizacion, $idEmpActualiza){
            $sql = "UPDATE empleados SET Nombre='$Nombre', primerApellido='$primerApellido', segundoApellido='$segundoApellido',
            email='$email', fechaEntrada='$fechaEntrada', fechaBaja='$fechaBaja', idDepartamento='$idDepartamento',
            idJefe='$idJefe', esJefe='$esJefe', Usuario='$Usuario', Password='$Password', Foto='$Foto',
            fechaActualizacion='$fechaActualizacion', idEmpActualiza='$idEmpActualiza'
            WHERE idEmpleado='$idEmpleado'";
            return ejecutarConsulta($sql);
        }

        public function desactivar($idEmpleado){
            $sql = "UPDATE empleados SET Activo = '0'
            WHERE idEmpleado = '$idEmpleado'";
            return ejecutarConsulta($sql);
        }

        public function activar($idEmpleado){
            $sql = "UPDATE empleados SET Activo = '1'
            WHERE idEmpleado = '$idEmpleado'";
            return ejecutarConsulta($sql);
        }
        public function mostrar($idEmpleado){
            $sql = "SELECT
            e.idEmpleado,
            e.Nombre,
            e.primerApellido,
            e.segundoApellido,
            e.email,
            e.fechaEntrada,
            e.fechaBaja,
            e.idDepartamento,
            e.idJefe,
            e.esJefe,
            e.Usuario,
            e.Password,
            e.Foto,
            e.Activo,
            e.fechaCreacion,
            e.fechaActualizacion,
            e.idEmpActualiza,
            FROM empleados e
            WHERE idEmpleado = '$idEmpleado'";
            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar(){
            $sql = "SELECT
            e.idEmpleado,
            e.Nombre,
            e.primerApellido,
            e.segundoApellido,
            e.email,
            e.fechaEntrada,
            e.fechaBaja,
            e.idDepartamento,
            d.Descripcion,
            e.idJefe,
            e2.Nombre AS jefeNombre,
            e2.primerApellido AS jefePrimerApellido,
            e.esJefe,
            e.Usuario,
            e.Password,
            e.Foto,
            e.Activo,
            e.fechaCreacion,
            e.fechaActualizacion,
            e.idEmpActualiza
            FROM empleados e
            INNER JOIN departamentos d 
            ON e.idDepartamento = d.idDepartamento
            INNER JOIN empleados e2
            ON e.idJefe = e2.idEmpleado
            ORDER BY e.primerApellido, e.segundoApellido, e.Nombre ASC";
            return ejecutarConsulta($sql);
        }

        public function select($idEmpleado){
            $sql = "SELECT
            e.idEmpleado,
            e.Nombre,
            e.primerApellido,
            e.segundoApellido,
            e.email,
            e.fechaEntrada,
            e.fechaBaja,
            e.idDepartamento,
            e.idJefe,
            e.esJefe,
            e.Usuario,
            e.Password,
            e.Foto,
            e.Activo,
            e.fechaCreacion,
            e.fechaActualizacion,
            e.idEmpActualiza,
            FROM empleados e
            WHERE idEmpleado = '$idEmpleado' AND Activo = '1'";
            return ejecutarConsulta($sql);
        }

    }

?>