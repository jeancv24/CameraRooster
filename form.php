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

    function generateRandomString(){
        $string = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz");
        return substr($string, 10);
    }
    
    if(isset($_FILES["image"])){

        $errors = array();
        $file_name = $_FILES["image"]["name"];
        $file_size = $_FILES["image"]["size"];
        $file_tmp = $_FILES["image"]["tmp_name"];
        $file_type = $_FILES["image"]["type"];
        $file_ext_arr = explode(".", $_FILES["image"]["name"]);

        $file_ext = end($file_ext_arr);
        $img_ext = array("jpeg", "jpg", "png");

        if(in_array($file_ext, $img_ext) === false) $errors[] = "Choose a JPEG or PNG file";

        if($file_size > 2097152) $errors[] = "2MB Max";

        if(empty($errors)){
           
            $img = generateRandomString().".".pathinfo($file_name, PATHINFO_EXTENSION);
            move_uploaded_file($file_tmp, "imagenes/".$img);
    
        }else{
            print_r($errors);
        }
    }

    function verify_fotos_participante($id_participante, $categoria){
        $database = new Medoo([
            "database_type" => "mysql",
            "database_name" => "camerarooster",
            "server" => "localhost",
            "username" => "root",
            "password" => "root"
        ]);

        $idfotografias = $database->select("tb_fotografia", "id_fotografia", [
            "id_participante" => $id_participante,
            "categoria" => $categoria
        ]);
        $lenfotos_participante = count($idfotografias);
        if($lenfotos_participante > 2){
            return false;
        }else{
            return true;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir fotografías / CameraRooster</title>
    <link rel="stylesheet" href="./css/Style.css">
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- header -->

    <?php include './php/header.php'; 
    
    if($_POST){
        date_default_timezone_set("America/Costa_Rica");
        $date_time = date("Y-m-d H:i:s");

        if(isset($username)){
            if(verify_fotos_participante($userid, $_POST["Categoria"])){
                $database->insert("tb_fotografia", [
                    "id_participante" => $userid,
                    "fecha_publicacion" => $date_time,
                    "titulo" => $_POST["Titulo"],
                    "descripcion" => $_POST["descripcion"],
                    "estado_participante" => "pendiente",
                    "categoria" => $_POST["Categoria"],
                    "imagen" => $img
                ]);
                header("Location: /camerarooster/perfil.php");
            }else{
                echo "Usted ya subió el maximo de fotografías en esta categoría.";
            }
        }else{
            echo "Debe iniciar sesión para subir su fotografía.";
        }

    }?>
    <!-- header -->


    <!-- form -->
    <section class="centerSection">
        <h1 class="generalText"> Bienvenido nombre</h1>
        <h2 class="generalText">Estas listo para subir tus fotografías</h2>
        <div class="secondText">
            <p>Inspira a otros a subir sus creaciones y consigue exposicion</p>
            <p>de tus fotos para que las vea todo el mundo!</p>

        </div>

    </section>

    

    <!-- Enviar Fotografías -->

    <section class="centerSection">
        <h3 class="generalText">Información de la fotografía</h3>

            <form class="contact-form" action="form.php" method="post" enctype="multipart/form-data" onsubmit="return checkForm(this);">

                </section class="">
                    <input class="ButtonForm" class="uploadBTN" id="upload" type="file" name="image" accept="image/png, image/jpeg">
                    <img id="preview" src="" alt="">
                   
                    
                </section>
                
                <div class="inputField" class="row">
                    <div>
                        <div class="col">
                            <input id="Titulo" class="input-text" type="text" name="Titulo" placeholder="Titulo *">
                        </div>
                        <div class="col">
                            
                            <select class="menu" name="Categoria" id="Categoria">
                                <?php
                                    $categorias = ["aerea", "naturaleza", "paisaje", "personas"];
                                    $len_categorias = count($categorias);

                                    for($i=0; $i<$len_categorias; $i++){
                                        echo "<option value='".$categorias[$i]."'>".$categorias[$i]."</option>";
                                    }
                                ?>
                            </select>

                        </div>

                    </div>

                </div>

                <div class="TextAreaField" class="row">
                    <textarea id="description" class="text-area" name="descripcion" placeholder="Descripción *" cols="30" rows="10"></textarea>
                </div>

                <div class="row">
                    <input class="Button" class="submit-btn" type="submit" value="Enviar">
                </div>

            </form>


    </section>
    <!-- Enviar Fotografías -->


    <!-- footer -->
    <footer>
        <div class="Logo"><img src="./imagenes/logo.jpg" alt="Logo" width="30px" height="30px" class="izquierda"></div>
        <aside class="LogoText">CameraRooster</aside>
        <div class="reset"></div>

        <p class="FooterTextCenter">Copyright 2020 - All right reserved</p>

    </footer>
    <!-- footer -->

    <script src="./js/main.js"></script>


    <script>

        function onSelectImage(event){
            let reader = new FileReader();
            reader.onload = function(e){
                let preview = document.getElementById("preview");
                preview.src = e.target.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        }

        document.addEventListener("DOMContentLoaded", (event)=>{
            let upload = document.getElementById("upload");
            upload.addEventListener("change", onSelectImage);
        });
    </script>
</body>
</html>