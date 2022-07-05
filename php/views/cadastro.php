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
    <h1>Cadastro de eventos</h1>
    <form action="../service/cadastro_service.php" method="post">
        <div class="form-line">
            <label class="left-label">Nome do evento:</label>
            <input id="name" type="text">
        </div>
        <div class="form-line">
            <label class="left-label">Data de início:</label>
                <input type="datetime-local" id="start_date">
        </div>
        <div class="form-line">
            <label class="left-label">Data de encerramento:</label>
                <input type="datetime-local" id="end_date">
        </div>
        <div class="form-line">
            <label class="left-label">Tipo do evento:</label>
            <input type="text" id="type">
        </div>
        <div class="form-line">
            <input type="checkbox" id="wifi">
            <label>Wi-fi</label><br>
            <input type="checkbox" id="free_parking">
            <label>Estacionamento grátis</label><br>
            <input type="checkbox" id="free_drink">
            <label>Bebida grátis</label>
        </div>
        <div class="form-line">
            <div>
                <label class="left-label">Descrição do evento:</label>
            </div>
            <textarea id="description" rows="5" cols="46" ></textarea>
        </div>
        <div class="form-line">
            <label class="left-label">Banner do evento:</label>
                <input id="banner" type="file">
        </div>
    </form>
    <button type="submit" onClick="submmit()">Enviar</button>
</body>
</html>