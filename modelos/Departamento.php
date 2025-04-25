<?php

    require "../config/conexion.php";

    Class Departamento{

        public function __construct(){
            
        }

        public function insertar($descripcion){
            $sql = "INSERT INTO departamentos(descripcion) VALUES ('$descripcion')";
            return ejecutarConsultaRetornaID($sql);
        }

        public function editar($idDepartamento, $descripcion, $fechaActualizacion, $idEmpActualiza){
            $sql = "UPDATE departamentos SET descripcion = '$descripcion', fechaActualizacion = '$fechaActualizacion', 
            idEmpleado = '$idEmpActualiza' WHERE idDepartamento = '$idDepartamento'";
            return ejecutarConsulta($sql);
        }

        public function desactivar($idDepartamento){
            $sql = "UPDATE departamentos SET activo = '0' WHERE idDepartamento = '$idDepartamento'";
            return ejecutarConsulta($sql);
        }

        public function activar($idDepartamento){
            $sql = "UPDATE departamentos SET activo = '1' WHERE idDepartamento = '$idDepartamento'";
            return ejecutarConsulta($sql);
        }
        
    }

?>