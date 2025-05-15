<?php

    require_once '../modelos/categoria.php';

    date_default_timezone_set("America/Mexico_City");

    $idCategoria = isset($_POST['idCategoria']) ? limpiarCadenas($_POST['idCategoria']): "";
    $descripcion = isset($_POST['descripcion']) ? limpiarCadenas($_POST['descripcion']): "";
    $fechaActualizacion = date("Y-m-d H:i:s"); 
    $idEmpActualiza = 1; //Cambiar por el usuario de la sesión 

    $categoria = new Categoria();

    switch($_GET['op']){
        case 'listar':
            $rspta = $categoria->listar();
            $data = Array();
            while ($reg = $rspta->fetch_object()){
                $data[] = array(
                    '0' => $reg->descripcion,
                    '1' => $reg->fechaCreacion,
                    '2' => $reg->fechaActualizacion,
                    '3' => ($reg->activo) ? '<span class="badge badge-success">Activado</span>' : '<span class="badge badge-danger">Desactivado</span>',
                    '4' => $reg->idEmpleado,
                    '5' => ($reg->activo) ? '<button class="btn btn-warning btn-sm" onclick="mostrar(' . $reg->idCategoria . ')">
                    <i class="far fa-edit"></i></button>' .
                    ' <button class="btn btn-danger btn-sm" title="Desactivar" onclick="desactivar(' . $reg->idCategoria . ')">
                    <i class="far fa-window-close"></i></button>' : 
                    '<button class="btn btn-warning btn-sm" onclick="mostrar(' . $reg->idCategoria . ')">
                    <i class="far fa-edit"></i></button>' .
                    ' <button class="btn btn-primary btn-sm" title="Activar" onclick="activar(' . $reg->idCategoria . ')">
                    <i class="far fa-check-square"></i></button>'
                );   
            }
            $results = array(
                "sEcho" => 1, //Informacion para el datatables
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case 'guardaryeditar':
            if(empty($idCategoria)){
                $rspta = $categoria->insertar($descripcion);
                echo $rspta != 0 ? "Categoría registrada" : "Error categoría no registrada";
            }else{
                $rspta = $categoria->editar($idCategoria, $descripcion, $fechaActualizacion, $idEmpActualiza);
                echo $rspta != 0 ? "Categoría actualizada" : "Error categoría no actualizada";
            }
        break;

        case 'mostrar':
            $rspta = $categoria->mostrar($idCategoria);
            echo json_encode($rspta);
        break;

        case 'desactivar':
            $rspta = $categoria->desactivar($idCategoria);
            echo $rspta ? "Categoría desactivada" : "Error la categoría no se pudo desactivar";
        break;

        case 'activar':
            $rspta = $categoria->activar($idCategoria);
            echo $rspta ? "La categoría ha sido activada" : "Error la categoría no se pudo activar";
        break;

    }

?>