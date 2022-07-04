var fileobj;

function upload_file(e) {
    
    // para não abrir a imagem em uma nova aba.
    e.preventDefault();

    document.getElementById("file_dropped").value = e.dataTransfer.files[0];
    // colocar o nome "fileobj.nome" em algum lugar na tela
}

function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var form_data = new FormData();
        form_data.append('file', file_obj);
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../ajax.php", true);
        xhttp.onload = function(event) {
            oOutput = document.querySelector('.img-content');
            if (xhttp.status == 200) {
                oOutput.innerHTML = "<img src='"+ this.responseText +"' alt='The Image' />";
            } else {
                oOutput.innerHTML = "Error " + xhttp.status + " occurred when trying to upload your file.";
            }
        }

        xhttp.send(form_data);
    }
}