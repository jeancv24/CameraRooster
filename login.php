<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión / CameraRooster</title>
    <link rel="stylesheet" href="./css/Style.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


    <!-- header -->

    <?php include './php/header.php'; ?>
    <!-- header -->




    <div class="loginDesktop">


        <!-- Login -->
        <!--<section class="marginMobile">
            <h1 class="generalTextLogin"> Inicia sesión con</h1>
            <div class="socialMediaBlock">
                <button class="socialMediaBtn">
					<img class="socialMediaIcons" src="./imagenes/Facebook.jpg" alt="facebook">
                </button>
                <button class="socialMediaBtn">
					<img class="socialMediaIcons" src="./imagenes/google.jpg" alt="google">
				</button>

            </div>


            <h2 class="generalText">O</h2>
        </section>-->
        <!-- Login -->


        <!-- Form Login -->


        <section class="centerSection">
            <form class="contact-form" action="/camerarooster/php/login.php" method="post" onsubmit="return checkForm(this);">

                <div class="inputField" class="row">
                    <div class="col">
                        <input size="35" name="user_email" class="input-text" type="text" placeholder="Correo electrónico *">
                    </div>
                    <div class="col">
                        <input size="35" name="pass" class="input-text" type="password" placeholder="Contraseña *">
                    </div>
                </div>


                <div class="center" class="row">
                    <input class="Button" class="submit-btn" type="submit" value="Iniciar sesión">
                </div>

            </form>

            <div class="marginText">
                <a class="secondText" class="recoverPassword" href="recuperarContraseña.html"><i class="recoverPassword"></i><span
						class="btn-label">Recuperar contraseña</span></a>

            </div>
        </section>

        <div class="LoginImageDiv">
            <img class="LoginImage" src="./imagenes/login/Login1.jpg" alt="imageLogin">


        </div>


        <!-- Form Login -->



    </div>


    <!-- footer -->
    <footer class="footerFixed">
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