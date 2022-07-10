function save(){
    let name = document.getElementById("name").value
    let id = document.getElementById("id").value
    let action = id ? 'edit' : 'create'
    let params = action == 'edit' ? `id=${id}&name=${name}` : `name=${name}`
    let xhttp = new XMLHttpRequest()
    xhttp.open('get',`../service/type_service.php?action=${action}&${params}`)
    xhttp.onload = function(event) {
        if(xhttp.status == 200){
            console.log("Sucesso em salvar um tipo")
            document.location.reload(true);
        } else {
            console.log("Erro ao criar um tipo")
        }
    }
    xhttp.send()
}

function edit(id, name){
    document.getElementById("id").value = id
    document.getElementById("name").value = name
    document.getElementById("secondary-btn").style.display = 'block'
}

function cancel(){
    document.getElementById("id").value = null
    document.getElementById("name").value = ""
    document.getElementById("secondary-btn").style.display = 'none'
}