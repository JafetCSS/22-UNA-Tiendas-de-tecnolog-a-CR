function goBack(){

    let form = document.createElement('form');
    form.action = '../view/manageRawStoreRequestView.php';
    form.method = 'Post';
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
                let form = document.createElement('form');
                form.action = '../view/manageRawStoreRequestView.php';
                form.method = 'Post';
                // add form to documento to send it
                document.body.append(form);
                form.submit();
            }else{
                alert("Hubo un error al aceptar solicitud");
                let form = document.createElement('form');
                form.action = '../view/manageRawStoreRequestView.php';
                form.method = 'Post';
                // add form to documento to send it
                document.body.append(form);
                form.submit();

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
                let form = document.createElement('form');
                form.action = '../view/manageRawStoreRequestView.php';
                form.method = 'Post';
                // add form to documento to send it
                document.body.append(form);
                form.submit();
            }else{
                alert("Hubo un error al rechazar solicitud");
                let form = document.createElement('form');
                form.action = '../view/manageRawStoreRequestView.php';
                form.method = 'Post';
                // add form to documento to send it
                document.body.append(form);
                form.submit();

            }
        }
    };
}