function create() {
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
                console.log("Erro ao importar uma imagem!")
            }
        }
        xhttp.send(form_data);
    }
}

function edit(){
    let current_banner = document.getElementById("current_banner").value
    let file_obj = document.getElementById('banner').files[0]
    if(file_obj != undefined) {
        delete_image(current_banner)
        var form_data = new FormData();                  
        form_data.append('file', file_obj);
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../service/image_importer.php", true);
        xhttp.onload = function(event) {
            if (xhttp.status == 200) {
                let body = getBodyWithId(this.responseText)
                submmitEvent(body)
            } else {
                console.log("Erro ao importar uma imagem!")
            }
        }
        xhttp.send(form_data);
    } else {
        let body = getBodyWithId(current_banner)
        submmitEvent(body)
    }
}

function submmitEvent(body){
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../service/evento_service.php", true);
    xhttp.setRequestHeader("Accept", "application/json");
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onload = function(event) {
            if (xhttp.status == 200) {
            window.location = `../../php/views/exibir.php?id=${xhttp.response}`
        } else {
            console.log("Erro ao salvar um evento!")            
            delete_image(body.banner)
        }
    }
    xhttp.send(body);
}

function delete_event(){
    let id = document.getElementById("id").value
    let banner = document.getElementById("banner").value
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", `../service/evento_service.php?action=apagar&id=${id}`, true);
    xhttp.onload = function(event){
        if(xhttp.status == 200){
            delete_image(banner)
            window.location = "../../php/views/listagem.php"
        } else {
            console.log("Erro ao deletar um evento!")
        }
    }
    xhttp.send()
}

function delete_image(filepath){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", `../service/image_importer.php?action=delete&filepath=${filepath}`, true);
    xhttp.onload = function(event){
        if(xhttp.status == 200){
            console.log(`${filepath} apagado com sucesso!`)
        } else {
            console.log(`Erro ao apagar ${filepath}`)
        }
    }
    xhttp.send()
}

function getBodyForm(banner){
    return JSON.stringify({
        name : document.getElementById("name").value,
        start_date : document.getElementById("start_date").value,
        end_date : document.getElementById("end_date").value,
        type : document.getElementById("type").value,
        wifi : document.getElementById("wifi").checked,
        free_parking : document.getElementById("free_parking").checked,
        free_drink : document.getElementById("free_drink").checked,
        description: document.getElementById("description").value,
        banner: banner
    })
}

function getBodyWithId(banner){
    let body = JSON.parse(getBodyForm(banner))
    body['id'] = document.getElementById("id").value
    return JSON.stringify(body)
}

function update_min_end_date(min_date){
    document.getElementById("end_date").min = min_date;
}