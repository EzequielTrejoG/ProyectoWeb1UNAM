<?php

    require_once '../config/conexion.php';

    $texto = "Aplicación de Gastos";

    echo "Texto original: " . $texto . "<br>";
    
    $enc = encryption($texto);

    echo "Texto encriptado: " . $enc . "<br>";

    $dec = decryption($enc);

    echo "Texto desencriptado: " . $dec . "<br>";

?>