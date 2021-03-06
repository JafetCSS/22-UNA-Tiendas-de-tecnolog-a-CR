function seeAllInformation(storeId){

    let form = document.createElement('form');
    form.action = '../view/checkStoreRequestInformationView.php';
    form.method = 'Post';
    form.innerHTML = '<input name="storeId" value="'+storeId+'">';
    // add form to documento to send it
    document.body.append(form);
    form.submit();
}

function acceptStoreRequest(storeId){

    var result;
    const data = new FormData();
    data.append("action", "accept");
    data.append("storeId", storeId);
    var http = new XMLHttpRequest();
    http.open('POST', '../business/storeRequestController.php', true);
    http.send(data);
    http.onreadystatechange = function(){

        if (http.readyState === 4){
            
            result = http.responseText;
            if(result+"." == "Complete."){

                alert("Se aceptó la solicitud correctamente");
                location.reload();
            }else{
                alert("Hubo un error al aceptar solicitud");
                location.reload();

            }
        }
    };
}

function rejectStoreRequest(storeId){

    var result;
    const data = new FormData();
    data.append("action", "reject");
    data.append("storeId", storeId);
    var http = new XMLHttpRequest();
    http.open('POST', '../business/storeRequestController.php', true);
    http.send(data);
    http.onreadystatechange = function(){

        if (http.readyState === 4){
            
            result = http.responseText;
            if(result+"." == "Complete."){

                alert("Se rechazó la solicitud correctamente");
                location.reload();
            }else{
                alert("Hubo un error al rechazar solicitud");
                location.reload();

            }
        }
    };
}