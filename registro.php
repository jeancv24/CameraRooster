<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Style.css">
    <link rel="stylesheet" href="./css/registro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Registro / CameraRooster</title>
</head>
<body>
    <!-- header -->
	
    <?php include './php/header.php'; ?>
    
    <!-- header -->

    <section>
        <!-- title-->
        <section class="main-section">
            <span class="primary-span"></span>
            <h1 class="h1-style">Registro</h1>
            <h2 class="h2-style">Ingresa tus datos</h2>
        </section>
        <!-- title-->

        <!--textfields-->
        <section class="left-container" >
            <form id="formRegister" action="/camerarooster/php/register.php" method="post">
                <p class="p-pc">Ingresa tus datos</p>
                <div class="input-textfield"> 
                    <input type="text" id="name" name="name" placeholder="Nombre">
                </div>
                <div class="input-textfield">
                    <input type="text" id="lastname" name="lastname" placeholder="Apellidos">
                </div>
                <div class="input-textfield">
                    <input type="text" name="user_email" id="user_email" placeholder="Correo Electronico">
                    <span id="info" class="error-message">This email address is registered</span>
                </div>
                <div class="input-textfield">
                    <input type="password" id="password" name="password" placeholder="Contraseña">
                </div>
                <div class="input-textfield">
                    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirmar Coontraseña">
                </div>
                <div>
                    <input class="registrarse-btn" type="submit" value="Registrarse">
                </div>
            </form>
        </section>

        <div>
            <img class="right-photo" src="./imagenes/registro-image.jpg" alt="decorative image">
        </div>
    </section>
    

    <!-- footer -->
    <footer class="footerFixed">
        <div class="Logo"><img src="./imagenes/logo.jpg" alt="Logo" width="30px" height="30px" class="izquierda"></div>
        <aside class="LogoText">CameraRooster</aside>
        <div class="reset"></div>

        <p class="FooterTextCenter">Copyright 2020 - All right reserved</p>

    </footer>
    <!-- footer -->
    <script src="./js/main.js"></script>
    <script src="./js/registro.js"></script>
    <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js
    "></script>
</body>
</html>