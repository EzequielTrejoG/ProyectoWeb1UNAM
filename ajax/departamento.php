<?php

    require_once '../modelos/departamento.php';

    date_default_timezone_set("America/Mexico_City");

    $idDepartamento = isset($_POST['idDepartamento']) ? limpiarCadenas($_POST['idDepartamento']): "";
    $descripcion = isset($_POST['descripcion']) ? limpiarCadenas($_POST['descripcion']): "";
    $fechaActualizacion = date("Y-m-d H:i:s"); 
    $idEmpActualiza = 1; //Cambiar por el usuario de la sesión 

    $departamento = new Departamento();

    switch($_GET['op']){
        case 'listar':
            $rspta = $departamento->listar();
            $data = Array();
            while ($reg = $rspta->fetch_object()){
                $data[] = array(
                    '0' => $reg->descripcion,
                    '1' => $reg->fechaCreacion,
                    '2' => $reg->fechaActualizacion,
                    '3' => ($reg->activo) ? '<span class="badge badge-success">Activado</span>' : '<span class="badge badge-danger">Desactivado</span>',
                    '4' => $reg->idEmpleado,
                    '5' => ($reg->activo) ? '<button class="btn btn-warning btn-sm" onclick="mostrar(' . $reg->idDepartamento . ')">
                    <i class="far fa-edit"></i></button>' .
                    ' <button class="btn btn-danger btn-sm" title="Desactivar" onclick="desactivar(' . $reg->idDepartamento . ')">
                    <i class="far fa-window-close"></i></button>' : 
                    '<button class="btn btn-warning btn-sm" onclick="mostrar(' . $reg->idDepartamento . ')">
                    <i class="far fa-edit"></i></button>' .
                    ' <button class="btn btn-primary btn-sm" title="Activar" onclick="activar(' . $reg->idDepartamento . ')">
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
            if(empty($idDepartamento)){
                $rspta = $departamento->insertar($descripcion);
                echo $rspta != 0 ? "Departamento registrado" : "Error departamento no registrado";
            }else{
                $rspta = $departamento->editar($idDepartamento, $descripcion, $fechaActualizacion, $idEmpActualiza);
                echo $rspta != 0 ? "Departamento actualizado" : "Error departamento no actualizado";
            }
        break;

        case 'mostrar':
            $rspta = $departamento->mostrar($idDepartamento);
            echo json_encode($rspta);
        break;

        case 'desactivar':
            $rspta = $departamento->desactivar($idDepartamento);
            echo $rspta ? "Departamento desactivado" : "Error el Depto no se pudo desactivar";
        break;

        case 'activar':
            $rspta = $departamento->activar($idDepartamento);
            echo $rspta ? "El departamento ha sido activado" : "Error el Depto no se pudo activar";
        break;

    }

?>