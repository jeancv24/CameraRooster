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

//USER - REGISTER


date_default_timezone_set("America/Costa_Rica");
$date_time = date("Y-m-d H:i:s");


$user_email = $_POST["user_email"];
$password = $_POST["pass"];
session_start();

if ($_POST) {


    $user = $database->select("tb_usuario", "*", [
        "correo_electronico" => $_POST["user_email"]
    ]);




    if ($user_email == "") {
        echo "El campo de username se encuentra vacio. \n";
    } else if ($user[0]["correo_electronico"] == $user_email) {
        $UserPass = true;
    } else {
        echo "El nombre de usuario ingresado no se encuentra registrado \n";

        $UserPass = false;
    }


    if ($password == "") {
        echo "El campo de password se encuentra vacio. \n";
    } else if (password_verify($_POST["pass"], $user[0]["contrasenia"])) {
        $passwordPass = true;
    } else if ($UserPass) {
        $passwordPass = false;
        echo "La password es incorrecta. \n";
    }


    //LOGIN
    if (($passwordPass) && ($UserPass)) {

        $_SESSION["id"]= $user[0]["id_usuario"];
        $_SESSION["username"]= $user[0]["nombre_usuario"];
        $_SESSION["email"]= $user[0]["correo_electronico"];  
        $_SESSION["tipo_usuario"]= $user[0]["tipo_usuario"];
        $_SESSION["fullName"]= $user[0]["nombre_completo"];
        $_SESSION["profilePic"]= $user[0]["profile_pic"];
        $_SESSION["isLoggedIn"]=true;
       

        header("Location: /camerarooster/index.php");

    }
}

?>