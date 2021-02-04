"use strict";

document.querySelector('.form-ajax').addEventListener('submit', (e) =>{
    e.preventDefault();

    const formData = new FormData(e.target);
    let request = new XMLHttpRequest();

    function reqReadyStateChange(){
        if(request.readyState == 4 && request.status == 200){
            alert("Отправлено");
        }
    }

    request.open("POST", "/send");
    request.onreadystatechange = reqReadyStateChange;
    request.send(formData);
})