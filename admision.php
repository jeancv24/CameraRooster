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

    $data = $database->select("tb_fotografia", [
        "[><]tb_usuario" => ["id_participante" => "id_usuario"] 
    ],[
         "id_fotografia", "estado_participante", "categoria", "imagen", "nombre_completo"
    ],[
        "estado_participante" => "pendiente"      
    ]);

    if($_POST){

        if(isset($_POST['aceptar'])){
            $database->update("tb_fotografia", [
                "estado_participante" =>"aceptado",
            ],[
                "id_fotografia" => $_POST['id_photo']
            ]);
     
            header("admison.php");
         }
         if(isset($_POST['rechazar'])){
             $database->update("tb_fotografia", [
                 "estado_participante" =>"rechazado" 
             ],[
                 "id_fotografia" => $_POST['id_photo']
             ]);
     
             header("admison.php");
         }

         $data = $database->select("tb_fotografia", [
            "[><]tb_usuario" => ["id_participante" => "id_usuario"] 
        ],[
             "id_fotografia", "estado_participante", "categoria", "imagen", "nombre_completo"
        ],[
            "estado_participante" => "pendiente"      
        ]);
    
    } 
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="./css/admision.css">
    <link rel="stylesheet" href="./css/Style.css">
    <title>Admisión / CameraRooster</title>
</head>
<body>
    <!-- header -->
    <?php include './php/header.php'; ?>
    <!-- header -->

    <!-- Intro-->
    <div class="intro-red-bar"></div>
    <section class="intro-section">
        
        <h2 class="intro-title">Admisión</h2>
        <p class="intro-text">Lista donde se admite o rechaza una fotografía</p>
    </section>
    <!-- Intro -->

    <!-- Photos -->
    <section class="photos-container" >

    <?php

      $len = count($data);
     
        for($i=0; $i<$len; $i++){
            echo "<section class='image-container'>";
            echo " <h2 class='name'>".$data[$i]["nombre_completo"]."</h2>";
            echo "<p class='category'>".$data[$i]["categoria"]."</p>"; 
            echo "<img class='image-size' src='./imagenes/".$data[$i]["imagen"]."' alt='Foto'>";
            echo "<form action='admision.php' method='post'>";
            echo "<input class='aceptar-btn' type='submit' value='Aceptar' name='aceptar'>";
            echo "<input class='rechazar-btn' type='submit' value='Rechazar' name='rechazar'>";
            echo "<input type='hidden' value='".$data[$i]["id_fotografia"]."' name='id_photo'>";
            echo "</form>"; 
            echo "</section>"; 
        }     

        
          
    ?>
    </section>
    <!-- Photos -->

    <!-- footer -->
    <footer>
        <div class="Logo"><img src="./imagenes/logo.jpg" alt="Logo" width="30px" height="30px" class="izquierda"></div>
		<aside class="LogoText" >CameraRooster</aside>
		<div class="reset"></div>
		
        <p class="FooterTextCenter">Copyright 2020 - All right reserved</p>

    </footer>
    <!-- footer -->

    
    <script src="./js/main.js"></script>
    <!--<script src="./js/admision.js"></script>-->
   
</body>
</html>