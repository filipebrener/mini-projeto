<?php include("../database/connect.inc.php");?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/evento.css">
    <link rel="icon" href="../utils/images/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="../../styles/upload_area.css">
    <script src="../../scripts/cadastro.js"></script>
    <script src="../../scripts/nav_bar.js"></script>
    <title>Cadastro</title>
</head>
<body>
    <?php include("../utils/navbar.html");?>
    <input type="hidden" id="screen" value="cadastro">
    <h1>Cadastro de Eventos</h1>
    <form action="../service/cadastro_service.php" method="post">
        <div class="form-line">
            <label class="left-label">Nome do evento:</label>
            <input name="name" type="text">
        </div>
        <div class="form-line">
            <label class="left-label">Data de início:</label>
                <input type="datetime-local" name="start_date">
        </div>
        <div class="form-line">
            <label class="left-label">Data de encerramento:</label>
                <input type="datetime-local" name="end_date">
        </div>
        <div class="form-line">
            <label class="left-label">Tipo do evento:</label>
            <input type="text" name="type">
        </div>
        <div class="form-line">
            <input type="checkbox" name="wifi">
            <label>Wi-fi</label><br>
            <input type="checkbox" name="free_parking">
            <label>Estacionamento grátis</label><br>
            <input type="checkbox" name="free_drink">
            <label>Bebida grátis</label>
        </div>
        <div class="form-line">
            <div>
                <label class="left-label">Descrição do evento:</label>
            </div>
            <textarea name="description" rows="5" cols="46" ></textarea>
        </div>
        <!-- <div class="form-line">
            <label class="left-label">Banner do evento (imagem):</label>
            <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
                <div id="drag_upload_file">
                    <p>Solte o arquivo aqui</p>
                    <p>Ou</p>
                    <input name="selected_banner" type="file" id="selectfile">
                    <input name="dropped_banner" type="hidden" id="file_dropped">
                </div>
            </div>
        </div> -->
    </form>
    <button onclick="submit()">Enviar</button>
</body>
</html>