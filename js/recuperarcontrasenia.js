let correos_existentes;

function verifyemail(){
    let correo_ingresado = document.getElementById("email").value;
    //se obtiene el correo ingresado en la pagina
    let len = correos_existentes.length;
    //se obtiene el largo del objeto para el For
    let show_message = document.getElementById("info");
    //se obtiene el span que muestra el error
    for($i=0; $i < len;$i++){
        if(correo_ingresado == correos_existentes[$i]){
            show_message.style.display = "none";
            break;
        }else{
            show_message.style.display = "block";
            break
        }
    }
}

function onBlurChange(){
    
    console.log("change");

    fetch("http://localhost/cameraRooster/php/recuperarcontrasena.php")
    .then(response => response.json())
    .then(data => {      
        correos_existentes=data;
        verifyemail();
    });
}

document.addEventListener('DOMContentLoaded', (event) =>{

    console.log("DOM loaded");

    let email = document.getElementById("email");
    email.addEventListener("blur", onBlurChange);

});