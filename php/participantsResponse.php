<?php

namespace Medoo;

require "Medoo.php";

use \Datetime;

$database = new Medoo([
    "database_type" => "mysql",
    "database_name" => "camerarooster",
    "server" => "localhost",
    "username" => "root",
    "password" => "root"
]);




$data = $database->select("tb_usuario",[
    "tb_usuario.nombre_completo(Nombre)", "tb_usuario.nombre_usuario(Usuario)", "tb_usuario.correo_electronico(Email)"
], [
	"tipo_usuario" => "participante"
]);

echo json_encode($data);





    
 

?>