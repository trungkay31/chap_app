const form = document.querySelector(".typing-area"),
inputF = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault(); //prevening from submitting
}

sendBtn.onclick = () => {
    // start ajax
    let xhr = new XMLHttpRequest(); // create XML obj
    xhr.open("POST", "php/insert_chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
               inputF.value = ""; // da insert mess vao db -> lam trong input
               scrollToBottom();
            }
        }
    }

    //send form data to php through ajax
    let formData = new FormData(form); // new data obj
    xhr.send(formData);
}

chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}

chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get_chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form); // new data obj
    xhr.send(formData);
}, 500); // run frequently after 500ms

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}