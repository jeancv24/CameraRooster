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
//Función de envio de correo electronico configurada en Xampp 1.7.3
//con el servicio Mercury 4.72, utilizando el servicio Mercury SMTP CLIENT
//por el puerto 25 y DNS a configurar según la red local

if($_POST["direccioncorreo"]){
    $newpsd = password_hash(generateRandomString(), PASSWORD_DEFAULT);

    $destino = $_POST["direccioncorreo"];
    $desde = "From: camera_rooster@camerarooster.com";
    $asunto = "Recuperación de contraseña.";
    $mensaje = "Su contraseña temporal es: ".$newpsd;
    mail($destino, $asunto, $mensaje, $desde);
    insertarContra($newpsd, $destino);
    echo "Correo Enviado a: ".$destino."<br>Considere que el correo electronico puede llegar como spam.";
}else{
    echo "Este correo no posee una cuenta.";
}
function generateRandomString(){
    $string = str_shuffle("ABCDEFGHIJKLMNOPQR");
    return substr($string, 5);
}
function insertarContra($contraGenerada, $email){
    $database = new Medoo([
        "database_type" => "mysql",
        "database_name" => "camerarooster",
        "server" => "localhost",
        "username" => "root",
        "password" => "root"
    ]);

    $database->update("tb_usuario", [
        "contrasenia" => $contraGenerada
    ], [
        "correo_electronico" => $email
    ]);
}
?>