const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault(); //prevening from submitting
}

continueBtn.onclick = () => {
    // start ajax
    let xhr = new XMLHttpRequest(); // create XML obj
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "users.php";
                }
                else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }

    //send form data to php through ajax
    let formData = new FormData(form); // new data obj
    xhr.send(formData);
}