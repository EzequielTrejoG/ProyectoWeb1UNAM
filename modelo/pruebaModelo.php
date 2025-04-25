<?php
    
    require_once "../modelo/Departamento.php";

    $departamento = new Departamento();

    $id01 = $departamento->insertar("Sistemas");
    
    echo "id del departamento: $id01 <br>";

?>