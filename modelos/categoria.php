<?php
    //incluir la configuracio de la conexion
    require "../config/conexion.php";
    
    //instanciar objeto
    Class Categoria{
        public function __construct(){ //doble _

        }
    
        public function insertar($descripcion){
            $sql = "INSERT INTO categorias (descripcion) values ('$descripcion')"; //query dinamico se crea cuando se ejecuta
            return ejecutarConsultaRetornaID($sql);
        }

        public function editar($idCategoria, $descripcion, $fechaActualizacion, $idEmpActualiza){
            $sql = "UPDATE categorias SET descripcion='$descripcion', fechaActualizacion='$fechaActualizacion', idEmpleado='$idEmpActualiza'
            WHERE idCategoria='$idCategoria'";
            return ejecutarConsulta($sql);
        }

        public function desactivar($idCategoria){
            $sql = "UPDATE categorias SET activo = '0'
            WHERE idCategoria='$idCategoria'";
            return ejecutarConsulta($sql);
        }

        public function activar($idCategoria){
            $sql = "UPDATE categorias SET activo = '1'
            WHERE idCategoria='$idCategoria'";
            return ejecutarConsulta($sql);
        }

        public function mostrar($idCategoria){
            $sql = "SELECT idCategoria, descripcion, activo, fechaCreacion, fechaActualizacion,
            idEmpleado FROM categorias
            WHERE idCategoria = '$idCategoria'";
            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar(){
            $sql = "SELECT idCategoria, descripcion, activo, fechaCreacion, fechaActualizacion,
            idEmpleado FROM categorias ORDER BY descripcion ASC";
            return ejecutarConsulta($sql);
        }

        public function select(){
            $sql = "SELECT idCategoria, descripcion, activo, fechaCreacion, fechaActualizacion,
            idEmpleado FROM categorias
            WHERE activo='1'";
            return ejecutarConsulta($sql);
        }

    }

?>