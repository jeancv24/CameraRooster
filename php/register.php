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



$user_email = $_POST["user_email"];
$password = $_POST["password"];
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$username = $_POST["name"].".".$_POST["lastname"];

$fullName=$name." ".$lastname;
$pass = password_hash($_POST["password"], PASSWORD_DEFAULT);







if ($_POST) {

    echo $username;

    $checkUsername = $database->select("tb_usuario", "*", [
        "nombre_usuario" => $username
    ]);

    $checkEmail = $database->select("tb_usuario", "*", [
        "correo_electronico" => $_POST["user_email"]
    ]);


    if ($name == "") {
        echo "El campo de name se encuentra vacio. \n";
    } else if ($checkUsername[0]["nombre_usuario"] == $username) {
        echo "Este nombre de usuario ya se encuentra registrado \n";
    } else {
        $UserPass = true;
    }


    if ($user_email == "") {
        echo "El campo de email se encuentra vacio. \n";
    } else if ($checkEmail[0]["correo_electronico"] == $user_email) {
        echo "Este correo electrónico ya se encuentra registrado. \n";
    } else {
        $emailPass = true;
    }

    if ($password == "") {
        echo "El campo de password se encuentra vacio. \n";
        $passwordField = false;
    } else {
        $passwordField = true;
    }

    if (($emailPass) && ($UserPass) && ($passwordField)) {

        $database->insert("tb_usuario", [
            "nombre_usuario" => $username,
            "contrasenia" => $pass,
            "correo_electronico" => $user_email,
            "nombre_completo" => $fullName,
            "tipo_usuario" => "participante",
            "profile_pic" => "default.png"

        ]);

        echo "Listo, el usuario ha sido registrado \n";

        header("Location: /camerarooster/login.php");
    }
}

if(isset($_SERVER["CONTENT_TYPE"])){
 
    $contentType = $_SERVER["CONTENT_TYPE"];

    if ($contentType === "application/json") {

        $content = trim(file_get_contents("php://input"));
    
        $decoded = json_decode($content, true);
    
        //echo json_encode($decoded["user"]);
    
        


           $email = $database->select("tb_usuario", "*", [
               "correo_electronico" => $decoded["decodEmail"]
           ]);
       

       
           
           if ($email[0]["correo_electronico"] == $decoded["decodEmail"]) {
               echo json_encode(300);

           } else {
               echo json_encode(401);
           }    
           
      
       

        

    }
}




?>