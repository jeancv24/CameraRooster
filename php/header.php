<?php


session_start();

if(isset($_SESSION["username"])){
    $username= $_SESSION["username"];
    $userType= $_SESSION["tipo_usuario"];
    $userid= $_SESSION["id"];
    $profilePic= $_SESSION["profilePic"];
    $email=$_SESSION["email"];
}



?>

    <!-- header -->

    <header>
        <!-- Top Navigation Menu -->

        <div class="topnav">
            <a href="./index.html" class="active" class="inline">
                <img class="header-logo" src="./imagenes/logo.jpg" alt="Logo" width="40" height="40">
                <p class="topText">CameraRooster</p>
            </a>

            <!-- Navigation links (hidden by default) -->
            <div id="myLinks">
                <a class="hoover-links" href="./index.php">Inicio</a>
                <a class="hoover-links" href="./galeria.php">Galería</a>

                <?php if(isset($username)) {if($userType === "administrador") { ?>
                    <a class="hoover-links" href="./participantes.php">Participantes</a>
                    <a class="hoover-links" href="./admision.php">Admision</a>
                    <a class="hoover-links" href="./registerAdmin.php">Register Admin</a>

                <?php }} ?>

                <?php if(!isset($username)) { ?>
                    <a class="hoover-links" href="./registro.php">Registrarse</a>
                    <a class="hoover-links" href="./login.php">Iniciar Sesión</a>
                <?php } ?>

                <?php if(isset($username)) { ?>
                    <a class="hoover-links" href="./form.php">Formulario</a>
                    <a class="hoover-links" href="./php/logout.php">Cerrar Sesión</a>
                    <a class="hoover-links" href="./perfil.php"><?php echo $username?> </a>
                    <a class="hoover-links" href="./perfil.php"> <img class="profilepic" src="./profilePics/<?php echo $profilePic ?>" alt="Foto"></a>
                <?php } ?>



            </div>
            <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
    <!-- header -->