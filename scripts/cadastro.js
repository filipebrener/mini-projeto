function submmit() {
    let file_obj = document.getElementById('banner').files[0]
    if(file_obj != undefined) {
        var form_data = new FormData();                  
        form_data.append('file', file_obj);
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../service/image_importer.php", true);
        xhttp.onload = function(event) {
            if (xhttp.status == 200) {
                let body = getBodyForm(this.responseText)
                submmitEvent(body)
            } else {
                console.log("deu ruim pra importar a image")
            }
        }
        xhttp.send(form_data);
    }
}

function submmitEvent(body){
    console.log(body)
    let =  new FormData(); 
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../service/cadastro_service.php", true);
    xhttp.setRequestHeader("Accept", "application/json");
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onload = function(event) {
        if (xhttp.status == 200) {
            window.location = "../../php/views/listagem.php"
        } else {
            // Erro ao salvar evento, tentar apagar imagem nesse ponto para que não tenha imagem salva desnecessáriamente
            console.log("Erro ao salvar evento")            
        }
    }
    xhttp.send(body);
}

function getBodyForm(banner){
    return JSON.stringify({
        name : document.getElementById("name").value,
        start_date : document.getElementById("start_date").value,
        end_date : document.getElementById("end_date").value,
        type : document.getElementById("type").value,
        wifi : document.getElementById("wifi").value,
        free_parking : document.getElementById("free_parking").value,
        free_drink : document.getElementById("free_drink").value,
        description: document.getElementById("description").value,
        banner: banner
    })
}