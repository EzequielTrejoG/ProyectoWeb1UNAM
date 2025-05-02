<?php

    require_once '../modelos/Departamento.php';

    $departamento = new Departamento();

    switch($_GET['op'])
    {
        case 'listar':
            $rspta = $departamento->listar();
            $data = Array();
            while ($reg = $rspta->fetch_object())
            {
                $data[] = array(
                    '0' => $reg->descripcion,
                    '1' => $reg->fechaCreacion,
                    '2' => $reg->fechaActualizacion,
                    '3' => ($reg->activo) ? '<span class="badge badge-success">Activado</span>' : '<span class="badge badge-danger">Desactivado</span>',
                    '4' => $reg->idEmpleado,
                    '5' => ($reg->activo) ? '<button class="btn btn-warning btn-sm" onclick="mostrar(' . $reg->idDepartamento . ')">
                    <i class="far fa-edit"></i></button>' .
                    ' <button class="btn btn-danger btn-sm" onclick="desactivar(' . $reg->idDepartamento . ')">
                    <i class="far fa-window-close"></i></button>' : 
                    '<button class="btn btn-warning btn-sm" onclick="mostrar(' . $reg->idDepartamento . ')">
                    <i class="far fa-edit"></i></button>' .
                    ' <button class="btn btn-primary btn-sm" onclick="activar(' . $reg->idDepartamento . ')">
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
    }

?>