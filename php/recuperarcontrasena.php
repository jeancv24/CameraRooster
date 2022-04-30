<?php
    namespace Medoo;
    require "Medoo.php";
    
    $database = new Medoo([
        "database_type" => "mysql",
        "database_name" => "camerarooster",
        "server" => "localhost",
        "username" => "root",
        "password" => "root"
    ]);

    $emails = $database->select("tb_usuario", "correo_electronico");

    echo json_encode($emails, true);
?>