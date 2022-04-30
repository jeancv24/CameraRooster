function onBlurChange(){
    
    console.log("change");
    let email = document.getElementById("user_email").value;
    let info = {decodEmail:email};

    console.log("change");

    fetch("http://localhost/camerarooster/php/register.php", {
        method: 'POST',
        mode: "same-origin",
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(info)
    })
    .then(response => response.json())
    .then(data => {  

            
        console.log(data);
        if(data===200){
            document.getElementById("info").style.display="block";
   

            document.getElementById('user_email').className = 'error';


        }


            
    });
}





document.addEventListener('DOMContentLoaded', (event) =>{

    console.log("DOM loaded");

    let email = document.getElementById("user_email");
    email.addEventListener("blur", onBlurChange);

});


$().ready(function() {
	$("#formRegister").validate({
		rules: {
			name: { required: true, minlength: 2},
			user_email: { required:true, email: true},
			validator: { required:true, maxlength: 4, minlength: 4}
		},
		messages: {
			name: "El campo es obligatorio.",
			user_email : "El campo es obligatorio y debe tener formato de email correcto.",
		}
	});
});