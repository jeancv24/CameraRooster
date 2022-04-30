<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de participantes / CameraRooster</title>
    <link rel="stylesheet" href="./css/Style.css">
    <link rel="stylesheet" href="./css/participantes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>



    <!-- header -->

    <?php include './php/header.php'; ?>
    <!-- header -->

    <!-- Lista -->

    <h1 class="TextParticipants">Lista de participantes</h1>

    <section class="marginSection">

        <div>
            <div class='mv_table'>
                <div class='accordian_content'>

                </div>
                <table class id='simple_table'>

                </table>
            </div>

        </div>

    </section>


    <!-- Lista -->


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
    <script src="./js/participantes.js"></script>

</body>

</html>