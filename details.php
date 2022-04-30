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

    if($_GET){
        $selected_photo = $database->select("tb_fotografia", "*", [
            "id_fotografia" => $_GET["idfoto"]
        ]);

        $participante_photo = $database->select("tb_usuario", "*", [
            "id_usuario" => $selected_photo[0]["id_participante"]
        ]);

        $count = $database->count("tb_votos", [
            "id_fotografia" => $_GET["idfoto"]
        ]);
    }



    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles / CameraRooster</title>
    <link rel="stylesheet" href="./css/Style.css">
    <link rel="stylesheet" href="./css/details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="detailsBG">



    <!-- header -->

    <?php include './php/header.php'; ?>
    <!-- header -->
    
    <!--box detail-->

    <div class="windowsDetails">

        <div class="divMargin ProfileDesktop">
            <img class="profilePhotos" src="./profilePics/<?php echo $participante_photo[0]["profile_pic"] ?>" alt="profilePhoto">
            <p class="profileName"><?php echo $participante_photo[0]["nombre_completo"]?> </p>
            <a class="profileView" href="#"><span class="btn-label">Ver perfil</span></a>
        </div>

        <div>
            <p class="category CategoryDesktop"><?php echo $selected_photo[0]["categoria"]?></p>
            <div class="container">
                <img class="image photos" src="./imagenes/<?php echo $selected_photo[0]["imagen"] ?>" alt="photo">
                <div class="middle">
                    <div class="text"><?php echo $selected_photo[0]["titulo"]?></div>
                    <div class="text"><?php echo $selected_photo[0]["descripcion"]?></div>
                </div>
            </div>


        </div>


        <div class="divMargin VotesDesktop">


            <span class="fa-stack fa-0.5x">
                <i class="fas fa-heart fa-stack-2x"></i>
            </span>
            <p class="Votes"><?php echo $count?> Votos</p>
            <p class="Date"><?php echo $selected_photo[0]["fecha_publicacion"]?></p>
        </div>

    </div>






    <!-- footer -->
    <footer>
        <div class="Logo"><img src="./imagenes/logo.jpg" alt="Logo" width="30px" height="30px" class="izquierda"></div>
        <aside class="LogoText">CameraRooster</aside>
        <div class="reset"></div>

        <p class="FooterTextCenter">Copyright 2020 - All right reserved</p>

    </footer>
    <!-- footer -->



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script src="./js/main.js"></script>

</body>

</html>