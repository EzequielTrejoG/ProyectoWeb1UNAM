<?php
    //incluir la configuracio de la conexion
    require "../config/conexion.php";
    
    //instanciar objeto
    Class Departamento{
        public function __construct(){ //doble _

        }
    
        public function insertar($descripcion){
            $sql= "INSERT INTO departamentos (descripcion) values ('$descripcion')"; //query dinamico se crea cuando se ejecuta
            return ejecutarConsultaRetornaID($sql);
        }

        public function editar($idDepartamento, $descripcion, $fechaActualizacion, $idEmpActualiza){
            $sql = "UPDATE departamentos SET descripcion='$descripcion', fechaActualizacion='$fechaActualizacion', idEmpleado='$idEmpActualiza'
            WHERE idDepartamento='$idDepartamento'";
            return ejecutarConsulta($sql);

        }

        public function desactivar($idDepartamento){
            $sql = "UPDATE departamentos SET activo = '0'
            WHERE idDepartamento='$idDepartamento'";
            return ejecutarConsulta($sql);
        }

        public function activar($idDepartamento){
            $sql = "UPDATE departamentos SET activo = '1'
            WHERE idDepartamento='$idDepartamento'";
            return ejecutarConsulta($sql);
        }

        public function mostrar($idDepartamento){
            $sql = "SELECT idDepartamento, descripcion, activo, fechaCreacion, fechaActualizacion,
            idEmpleado FROM departamentos
            WHERE idDepartamento = '$idDepartamento'";
            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar(){
            $sql = "SELECT idDepartamento, descripcion, activo, fechaCreacion, fechaActualizacion,
            idEmpleado FROM departamentos";
            return ejecutarConsulta($sql);
        }

        public function select(){
            $sql = "SELECT idDepartamento, descripcion, activo, fechaCreacion, fechaActualizacion,
            idEmpleado FROM departamentos
            WHERE activo='1'";
            return ejecutarConsulta($sql);
        }

    }

?>