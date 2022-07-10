<?php 
    include("../database/connect.inc.php");
    include("../service/date_formater_service.php");
    include("../service/type_functions_service.php");
    $current_datetime = get_date_time_format(time());
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/exibir.css">
    <link rel="icon" href="../utils/images/favicon.ico" type="image/ico">
    <script src="../../scripts/evento.js"></script>
    <script src="../../scripts/nav_bar.js"></script>
    <title>Cadastro</title>
</head>
<body style="background-color: #04aa6d0c;">
    <?php include("../utils/navbar.html");?>
    <input type="hidden" id="screen" value="cadastro">
    <div id="container" style="background-color: #04aa6d36;">
        <div id="form">
            <form>
                <h1>Cadastro de eventos</h1>
                <div class="form-line">
                    <label class="left-label">Nome do evento:</label>
                    <input id="name" type="text">
                </div>
                <div class="form-line">
                    <label class="left-label">Data de início:</label>
                    <input type="datetime-local" onchange="update_min_end_date(this.value)" min="<?php echo $current_datetime;?>" id="start_date">
                </div>
                <div class="form-line">
                    <label class="left-label">Data de encerramento:</label>
                    <input type="datetime-local" id="end_date">
                </div>
                <div class="form-line">
                    <label class="left-label">Tipo do evento:</label>
                    <select id="type_id">
                        <option selected disabled hidden>Selecione um tipo</option>
                    <?php get_options() ?>
                    </select>
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
        </div>
    <button id="main-btn" type="submit" onClick="create()">Enviar</button>
</div>
</body>
</html>