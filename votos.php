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
          
   session_start();

   if(isset($_SESSION["isLoggedIn"])){
        if(isset($_SERVER["CONTENT_TYPE"])){

            $contentType = $_SERVER["CONTENT_TYPE"];

            if ($contentType === "application/json") {

                $content = trim(file_get_contents("php://input"));
            
                $decoded = json_decode($content, true);
            
                //echo json_encode($decoded["user"]);
            
                
                $database->insert("tb_votos", [
                    "id_usuario" => $_SESSION["id"],
                    "id_fotografia" => $decoded["foto"]
                ]);

                echo json_encode(200); 
            }
        } 

    }else{
        echo json_encode(401);
    }
 
?>