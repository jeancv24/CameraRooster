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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="./css/Style.css">
    <link rel="stylesheet" href="./css/perfil.css">
    <title>Perfil / CameraRooster</title>
</head>

<body>
    <!-- header -->
    <?php include './php/header.php'; ?>
    <!-- header -->

    <!-- bio -->
    <a href="cambiar-foto-perfil.php"><div class="bio-avatar"> </div></a> 
    <section class="bio-container">
    <?php
        echo"<h1 class='bio-name'>".$_SESSION["username"]."</h1>"; 
        echo"<p class='bio-email'>".$email."</p>"; 
    ?>
        <nav>
            <ul class="bio-social-media">
            <a href="form.php"> <button>Subir Fotografía</button></a>   
            </ul>
        </nav>
    </section>
    <!-- bio -->

    <!-- paisaje -->
    <section class="category-container">
        <h2 class="category-paisaje">Paisaje</h2>
    </section>

    <section class="cantagories-color">

        <ul class="slider">
        <?php

        $data = $database->select("tb_fotografia", "*", [
            "categoria" => "paisaje",
            "estado_participante" => "aceptado",
            "id_participante" => $_SESSION["id"]
        ]);

            $len = count($data);
            for($i=0; $i<$len; $i++){

                $count = $database->count("tb_votos", [
                    "id_fotografia" => $data[$i]["id_fotografia"]
                ]); 

                echo"<li id='slide".$i."'>"; 
                echo"<section class='image-conteiner'>"; 
                echo"<p class='image-date'>".$data[$i]["fecha_publicacion"]."</p>";
                echo "<img class='image-size' src='./imagenes/".$data[$i]["imagen"]."' alt='Foto'>";
                echo"<i class='far fa-heart image-votes-color fa-stack-2x'></i>";
                echo"<p class='image-votes'>".$count."</p>";
                echo"<h3 class='image-title'>".$data[$i]["titulo"]."</h3>";
                echo"<p class='image-description'>".$data[$i]["descripcion"]."</p>";
                echo"</section>"; 
                echo" </li>";   
            }
        ?>
           
        </ul>

        <ul class="menu">
            <li>
                <a href="#slide1">1</a>
            </li>
            <li>
                <a href="#slide2">2</a>
            </li>
            <li>
                <a href="#slide3">3</a>
            </li>
        </ul>

    </section>


    <!-- paisaje -->

    <!-- naturaleza -->
    <section class="category-container">
        <h2 class="category-naturaleza">Naturaleza</h2>
    </section>

    <section class="cantagories-color">

        <ul class="slider">
        <?php

            $data = $database->select("tb_fotografia", "*", [
                "categoria" => "naturaleza",
                "estado_participante" => "aceptado",
                "id_participante" => $_SESSION["id"]
            ]);

                $len = count($data);
                for($i=0; $i<$len; $i++){

                    $count = $database->count("tb_votos", [
                        "id_fotografia" => $data[$i]["id_fotografia"]
                    ]); 

                    echo"<li id='slide".$i."'>"; 
                    echo"<section class='image-conteiner'>"; 
                    echo"<p class='image-date'>".$data[$i]["fecha_publicacion"]."</p>";
                    echo "<img class='image-size' src='./imagenes/".$data[$i]["imagen"]."' alt='Foto'>";
                    echo"<i class='far fa-heart image-votes-color fa-stack-2x'></i>";
                    echo"<p class='image-votes'>".$count."</p>";
                    echo"<h3 class='image-title'>".$data[$i]["titulo"]."</h3>";
                    echo"<p class='image-description'>".$data[$i]["descripcion"]."</p>";
                    echo"</section>"; 
                    echo" </li>";   
                }
        ?>
        </ul>
        <ul class="menu">
            <li>
                <a href="#slide1">1</a>
            </li>
            <li>
                <a href="#slide2">2</a>
            </li>
            <li>
                <a href="#slide2">3</a>
            </li>
        </ul>
    </section>
    <!-- naturaleza -->

    <!-- aerea -->
    <section class="category-container">
        <h2 class="category-aerea">Aerea</h2>
    </section>

    <section class="cantagories-color">
    <ul class="slider">
        <?php

            $data = $database->select("tb_fotografia", "*", [
                "categoria" => "aerea",
                "estado_participante" => "aceptado",
                "id_participante" => $_SESSION["id"]
            ]);

                $len = count($data);
                for($i=0; $i<$len; $i++){

                    $count = $database->count("tb_votos", [
                        "id_fotografia" => $data[$i]["id_fotografia"]
                    ]); 

                    echo"<li id='slide".$i."'>"; 
                    echo"<section class='image-conteiner'>"; 
                    echo"<p class='image-date'>".$data[$i]["fecha_publicacion"]."</p>";
                    echo "<img class='image-size' src='./imagenes/".$data[$i]["imagen"]."' alt='Foto'>";
                    echo"<i class='far fa-heart image-votes-color fa-stack-2x'></i>";
                    echo"<p class='image-votes'>".$count."</p>";
                    echo"<h3 class='image-title'>".$data[$i]["titulo"]."</h3>";
                    echo"<p class='image-description'>".$data[$i]["descripcion"]."</p>";
                    echo"</section>"; 
                    echo" </li>";   
                }
        ?>
        </ul>
        <ul class="menu">
            <li>
                <a href="#slide1">1</a>
            </li>
            <li>
                <a href="#slide2">2</a>
            </li>
            <li>
                <a href="#slide2">3</a>
            </li>
        </ul>

    </section>
    <!-- aerea -->

    <!-- personas -->
    <section class="category-container">
        <h2 class="category-personas">Personas</h2>
    </section>

    <section class="cantagories-color">
    <ul class="slider">
        <?php

            $data = $database->select("tb_fotografia", "*", [
                "categoria" => "personas",
                "estado_participante" => "aceptado",
                "id_participante" => $_SESSION["id"]
            ]);

                $len = count($data);
                for($i=0; $i<$len; $i++){

                    $count = $database->count("tb_votos", [
                        "id_fotografia" => $data[$i]["id_fotografia"]
                    ]); 

                    echo"<li id='slide".$i."'>"; 
                    echo"<section class='image-conteiner'>"; 
                    echo"<p class='image-date'>".$data[$i]["fecha_publicacion"]."</p>";
                    echo "<img class='image-size' src='./imagenes/".$data[$i]["imagen"]."' alt='Foto'>";
                    echo"<i class='far fa-heart image-votes-color fa-stack-2x'></i>";
                    echo"<p class='image-votes'>".$count."</p>";
                    echo"<h3 class='image-title'>".$data[$i]["titulo"]."</h3>";
                    echo"<p class='image-description'>".$data[$i]["descripcion"]."</p>";
                    echo"</section>"; 
                    echo" </li>";   
                }
        ?>
        </ul>
        <ul class="menu">
            <li>
                <a href="#slide1">1</a>
            </li>
            <li>
                <a href="#slide2">2</a>
            </li>
            <li>
                <a href="#slide2">3</a>
            </li>
        </ul>

    </section>
    <!-- personas -->

    <!-- footer -->
    <footer>
        <div class="Logo"><img src="./imagenes/logo.jpg" alt="Logo" width="30px" height="30px" class="izquierda"></div>
        <aside class="LogoText">CameraRooster</aside>
        <div class="reset"></div>

        <p class="FooterTextCenter">Copyright 2020 - All right reserved</p>

    </footer>
    <!-- footer -->

    <script src="./js/main.js"></script>
</body>

</html>