
        function voting(id){
            console.log(id);

            let info = {
                foto: id
            };

            fetch("http://localhost/cameraRooster/votos.php", {
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
                
                if(data === 401){
                    alert("Registrate para poder votar por tu foto favorita!");
                }

                if(data === 200){
                   // alert("You've voted for this book");
                    let btn = document.getElementById(id);
                    btn.removeAttribute("onclick");
                    btn.classList.remove("far");
                    btn.classList.add("fas");

                    let votes = document.getElementById("v"+id);
                    let updateVotes = Number(votes.innerText);
                    updateVotes += 1;
                    votes.innerText  = updateVotes;
                }
  
           });
            
        }

        document.addEventListener('DOMContentLoaded', (event) =>{

            console.log("DOM loaded");

        });