<?php
    //incluir la configuracio de la conexion
    require "../config/conexion.php";
    
    //instanciar objeto
    Class Departamento{
        public function __construct(){ //doble _

        }
    
        public function insertar($descripcion){
            $sql = "INSERT INTO departamentos (descripcion) values ('$descripcion')"; //query dinamico se crea cuando se ejecuta
            return ejecutarConsultaRetornaID($sql);
        }

        public function editar($idCategoria, $descripcion, $fechaActualizacion, $idEmpActualiza){
            $sql = "UPDATE departamentos SET descripcion='$descripcion', fechaActualizacion='$fechaActualizacion', idEmpleado='$idEmpActualiza'
            WHERE idCategoria='$idCategoria'";
            return ejecutarConsulta($sql);
        }

        public function desactivar($idCategoria){
            $sql = "UPDATE departamentos SET activo = '0'
            WHERE idCategoria='$idCategoria'";
            return ejecutarConsulta($sql);
        }

        public function activar($idCategoria){
            $sql = "UPDATE departamentos SET activo = '1'
            WHERE idCategoria='$idCategoria'";
            return ejecutarConsulta($sql);
        }

        public function mostrar($idCategoria){
            $sql = "SELECT idCategoria, descripcion, activo, fechaCreacion, fechaActualizacion,
            idEmpleado FROM departamentos
            WHERE idCategoria = '$idCategoria'";
            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar(){
            $sql = "SELECT idCategoria, descripcion, activo, fechaCreacion, fechaActualizacion,
            idEmpleado FROM departamentos ORDER BY descripcion ASC";
            return ejecutarConsulta($sql);
        }

        public function select(){
            $sql = "SELECT idCategoria, descripcion, activo, fechaCreacion, fechaActualizacion,
            idEmpleado FROM departamentos
            WHERE activo='1'";
            return ejecutarConsulta($sql);
        }

    }

?>