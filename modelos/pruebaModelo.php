<?php
    
    require_once "../modelos/Departamento.php";

    $departamento = new Departamento();

    /*$id01 = $departamento->insertar("Sistemas");
    
    echo "id del departamento: $id01 <br>"; */

    $fechaActualizacion = date("Y-m-d H:i:s");

    $departamento->editar('1', 'VentasRegionales',$fechaActualizacion, '3');

?>