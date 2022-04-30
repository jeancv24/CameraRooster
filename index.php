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

    $fotografias = $database->select("tb_fotografia", "id_fotografia", ["estado_participante" => "aceptado"]);
    $lenfotografias = count($fotografias);

    //$top_fotos = $database->select("tb_fotografia","imagen", ["ORDER" => "cantidad_votos",]);
    //$top_fotos = $database->select("tb_fotografia","imagen"]);
    //$lentop = count($top_fotos);

    for ($i = 0; $i < $lenfotografias - 1; $i++)
    {
        for ($j = 0; $j < $lenfotografias -1; $j++)
        {
            if (conteo_votos($fotografias[$j]) < conteo_votos($fotografias[$j+1]))
            { 
                $aux_foto = $fotografias[$j];
                $fotografias[$j] = $fotografias[$j+1];
                $fotografias[$j+1] = $aux_foto;
            }
        }
    }

    function conteo_votos($id_fotografia)
    {
        $database = new Medoo([
            "database_type" => "mysql",
            "database_name" => "camerarooster",
            "server" => "localhost",
            "username" => "root",
            "password" => "root"
        ]);
        $votos = $database->select("tb_votos", "id_voto", ["id_fotografia" => $id_fotografia]);
        $len = count($votos);
        return $len;
    }

    function getImagen($id){
        $database = new Medoo([
            "database_type" => "mysql",
            "database_name" => "camerarooster",
            "server" => "localhost",
            "username" => "root",
            "password" => "root"
        ]);
        $imagen = $database->select("tb_fotografia", "imagen", ["id_fotografia" => $id]);
        return $imagen[0];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CameraRooster</title>
    <link rel="stylesheet" href="./css/Style.css">
    <link rel="stylesheet" href="./css/principal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- header -->
	<?php include './php/header.php'; ?>
    
    <!-- header -->

    <!-- title-->

    <section class="background-image" >
        <h1 class="title">Concurso de Fotografia</h1>
        <p class="secondary-text">Sube tus fotografias, las mejores 10 serán premiadas. 
        Y no olvides votar tus favoritas.</p>
    </section>
    
    <!-- title-->

    <!--Las mas votadas-->
    <h2 class="second-title">Las 10 mas votadas</h2>

    <!--VERSION MOVIL-->
    <section class="voted-movil">
        <section id="1rowmovil"> <!--first five photos-->
            <div>
                
                
                <?php
                    if($lenfotografias >= 1){
                        echo "<div id='slide1' class='info-movil'><div class='position'>1</div><div id='one' class='number-votes'>".conteo_votos($fotografias[0])." Votos</div></div>";
                        echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[0])."' alt='first position'>";
                    }
                ?>
            </div>
            <div>
                <?php
                    if($lenfotografias >= 2){
                        echo "<div id='slide2' class='info-movil'><div class='position'>2</div><div id='two' class='number-votes'>".conteo_votos($fotografias[1])." Votos</div></div>";
                        echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[1])."' alt='second position'>";
                    }
                ?>
            </div>
            <div>
                <?php
                    if($lenfotografias >= 3){
                        echo "<div id='slide3' class='info-movil'><div class='position'>3</div><div id='three' class='number-votes'>".conteo_votos($fotografias[2])." Votos</div></div>";
                        echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[2])."' alt='third position'>";
                    }
                ?>
            </div>
            <div>
                <?php
                    if($lenfotografias >= 4){
                        echo "<div id='slide4' class='info-movil'><div class='position'>4</div><div id='four' class='number-votes'>".conteo_votos($fotografias[3])." Votos</div></div>";
                        echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[3])."' alt='fourth position'>";
                    }
                ?>
            </div>
            <div>
                <?php
                    if($lenfotografias >= 5){
                        echo "<div id='slide5' class='info-movil'><div class='position'>5</div><div id='five' class='number-votes'>".conteo_votos($fotografias[4])." Votos</div></div>";
                        echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[4])."' alt='fifth position'>";
                    }
                ?>
            </div>

        </section>

        <section id="2rowmovil"> <!--second five photos-->
            <div>
                <?php
                    if($lenfotografias >= 6){
                        echo "<div id='slide6' class='info-movil'><div class='position'>6</div><div id='six' class='number-votes'>".conteo_votos($fotografias[5])." Votos</div></div>";
                        echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[5])."' alt='sixth position'>";
                    }
                ?>
            </div>
            <div>
                <?php
                    if($lenfotografias >= 7){
                        echo "<div id='slide7' class='info-movil'><div class='position'>7</div><div id='seven' class='number-votes'>".conteo_votos($fotografias[6])." Votos</div></div>";
                        echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[6])."' alt='seventh position'>";
                    }
                ?>
            </div>
            <div>
                <?php
                    if($lenfotografias >= 8){
                    echo "<div id='slide8' class='info-movil'><div class='position'>8</div><div id='eight' class='number-votes'>".conteo_votos($fotografias[7])." Votos</div></div>";
                    echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[7])."' alt='eighth position'>";
                    }
                ?>
            </div>
            <div>
                <?php
                    if($lenfotografias >= 9){
                        echo "<div id='slide9' class='info-movil'><div class='position'>9</div><div id='nine' class='number-votes'>".conteo_votos($fotografias[8])." Votos</div></div>";
                        echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[8])."' alt='nineth position'>";
                    }
                ?>
            </div>
            <div>
                <?php
                    if($lenfotografias >= 10){
                        echo "<div id='slide10' class='info-movil'><div class='position'>10</div><div id='ten' class='number-votes'>".conteo_votos($fotografias[9])." Votos</div></div>";
                        echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[9])."' alt='tenth position'>";
                    }
                ?>
            </div>
        </section>
    </section>

    <!-- VERSION DESKTOP-->
    <section class="voted-desktop">
        <section id="1row"> <!--first five photos-->
            <?php
                if($lenfotografias >= 1){
                    echo "<div class='primer-fila-votos'>".conteo_votos($fotografias[0])." Votos</div>";
                    echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[0])."' alt='first position'>";
                }
                if($lenfotografias >= 2){
                    echo "<div class='primer-fila-votos'>".conteo_votos($fotografias[1])." Votos</div>";
                    echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[1])."' alt='second position'>";
                }
                if($lenfotografias >= 3){
                    echo "<div class='primer-fila-votos'>".conteo_votos($fotografias[2])." Votos</div>";
                    echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[2])."' alt='third position'>";
                }
                if($lenfotografias >= 4){
                    echo "<div class='primer-fila-votos'>".conteo_votos($fotografias[3])." Votos</div>";
                    echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[3])."' alt='fourth position'>";
                }
                if($lenfotografias >= 5){
                    echo "<div class='primer-fila-votos'>".conteo_votos($fotografias[4])." Votos</div>";
                    echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[4])."' alt='fifth position'>";
                }
            ?>
        </section>

        <section id="2row"> <!--second five photos-->
            <?php
                if($lenfotografias >= 6){
                    echo "<div class='segunda-fila-votos'>".conteo_votos($fotografias[5])." Votos</div>";
                    echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[5])."' alt='sixth position'>";
                }
                if($lenfotografias >= 7){
                    echo "<div class='segunda-fila-votos'>".conteo_votos($fotografias[6])." Votos</div>";
                    echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[6])."' alt='seventh position'>";
                }
                if($lenfotografias >= 8){
                    echo "<div class='segunda-fila-votos'>".conteo_votos($fotografias[7])." Votos</div>";
                    echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[7])."' alt='eighth position'>";
                }
                if($lenfotografias >= 9){
                    echo "<div class='segunda-fila-votos'>".conteo_votos($fotografias[8])." Votos</div>";
                    echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[8])."' alt='nineth position'>";
                }
                if($lenfotografias >= 10){
                    echo "<div class='segunda-fila-votos'>".conteo_votos($fotografias[9])." Votos</div>";
                    echo "<img class='voted-images' src='./imagenes/".getImagen($fotografias[9])."' alt='tenth position'>";
                }
            ?>
        </section>
    </section>
    <!--Las mas votadas-->

    <!-- footer -->
    <footer>
        <div class="Logo"><img src="./imagenes/logo.jpg" alt="Logo" width="30px" height="30px" class="izquierda"></div>
		<aside class="LogoText" >CameraRooster</aside>
		<div class="reset"></div>
		
        <p class="FooterTextCenter">Copyright 2020 - All right reserved</p>

    </footer>
    <!-- footer -->
    <script src="./js/main.js"></script>
    <script src="./js/principal.js"></script>
</body>
</html>