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
         "id_fotografia", "cantidad_votos", "fecha_publicacion", "estado_participante", "categoria", "imagen", "nombre_completo"
    ],[
        "estado_participante" => "aceptado"     
    ]);
    
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="./css/galeria.css">
    <link rel="stylesheet" href="./css/Style.css">
    <title>Galería / CameraRooster</title>
</head>

<body>
    <!-- header -->
    <?php include './php/header.php'; ?>
    <!-- header -->

    <!-- Intro-->
    <div class="intro-red-bar"></div>
    <?php
    //session_start();
    if(isset($_SESSION["isLoggedIn"])){
        echo"<section class='intro-section'>";
        echo " <h2 class='intro-title'>Galería</h2>";
        echo "<h3 class='intro-text'>Hola ".$_SESSION["username"]." vota por tus fotografías favoritas!</h3>";
        echo "</section>";
    }else{
        echo"<section class='intro-section'>";
        echo " <h2 class='intro-title'>Galería</h2>";
        echo "<h3 class='intro-text'>Registrate para poder votar!</h3>";
        echo "</section>";
    }

    ?>
    <!-- Intro -->

    <!-- Photos -->
    <section class="photos-container">

    <?php

        $len = count($data);
        for($i=0; $i<$len; $i++){

            $count = $database->count("tb_votos", [
                "id_fotografia" => $data[$i]["id_fotografia"]
            ]);


            $hasVoted = [];

            if(isset($_SESSION["isLoggedIn"])){ 
                $hasVoted = $database->select("tb_votos", "*", [
                    "AND" =>[
                        "id_usuario" =>  $_SESSION["id"],
                        "id_fotografia" => $data[$i]["id_fotografia"]
                    ]
                ]);
            }

            if(count($hasVoted) > 0){
                $style = "fas fa-heart";
                $click = "";
            }else{
                $style = "vote-icon far fa-heart";
                $click = "onclick='voting(this.id)'";
            }

            echo "<section class='image-container'>";
            echo"<h2 class='name'>".$data[$i]["nombre_completo"]."</h2>";
            echo"<p class='category'>".$data[$i]["categoria"]."</p>";
            echo"<a href='details.php? idfoto=".$data[$i]["id_fotografia"]."'>"."<img class='image-size' src='./imagenes/".$data[$i]["imagen"]."' alt='Foto'>"."</a>"; 
            echo "<p class='votes'><i id='".$data[$i]["id_fotografia"]."' class='".$style."' ".$click." ></i></p>";
            echo"<p class='votes'><span id='v".$data[$i]["id_fotografia"]."'>".$count."</span> votos</p></div>"; 
            echo"<p class='date'>".$data[$i]["fecha_publicacion"]."</p>";
            echo"</section>";
        }//for end     
          
    ?>
    </section>
    <!-- Photos -->

    <!-- footer -->
    <footer>
        <div class="Logo"><img src="./imagenes/logo.jpg" alt="Logo" width="30px" height="30px" class="izquierda"></div>
        <aside class="LogoText">CameraRooster</aside>
        <div class="reset"></div>

        <p class="FooterTextCenter">Copyright 2020 - All right reserved</p>

    </footer>
    <!-- footer -->

    <script src="./js/main.js"></script>
    <script src="./js/galeria-votos.js"></script>

</body>

</html>