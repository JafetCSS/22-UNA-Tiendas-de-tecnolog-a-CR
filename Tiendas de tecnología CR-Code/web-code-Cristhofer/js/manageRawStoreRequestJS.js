function seeAllInformation(requestId){

    let form = document.createElement('form');
    form.action = '../view/checkStoreRequestInformation.php';
    form.method = 'Post';
    form.innerHTML = '<input name="requestId" value="'+requestId+'">';
    // el formulario debe estar en el document para poder enviarlo
    document.body.append(form);
    form.submit();
}

function acceptStoreRequest(requestId){

    var result;
    const data = new FormData();
    data.append("action", "accept");
    data.append("requestId", requestId);
    var http = new XMLHttpRequest();
    http.open('POST', '../business/storeRequestController.php', true);
    http.send(data);
    http.onreadystatechange = function(){

        if (http.readyState === 4){
            
            result = http.responseText;
        }
    };
}

function rejectStoreRequest(requestId){

    var result;
    const data = new FormData();
    data.append("action", "reject");
    data.append("requestId", requestId);
    var http = new XMLHttpRequest();
    http.open('POST', '../business/storeRequestController.php', true);
    http.send(data);
    http.onreadystatechange = function(){

        if (http.readyState === 4){
            
            result = http.responseText;
        }
    };
}