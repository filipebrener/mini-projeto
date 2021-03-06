<?php

    include("../database/connect.inc.php");
    include("../service/date_formater_service.php");
    include("../service/type_functions_service.php");

    $id = $_GET['id'];
    $sql = "SELECT * FROM evento WHERE id = $id LIMIT 1";
    $result = $conn->query($sql);
    if($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $type = $row['type'];
        $banner = $row['banner'];
        $wifi = $row['wifi'];
        $free_parking = $row['free_parking'];
        $free_drink = $row['free_drink'];
        $description = $row['description'];
        $start_datetime = get_date_time_format(strtotime($row['start_date']));
        $end_datetime = get_date_time_format(strtotime($row['end_date']));
        $current_datetime = get_date_time_format(time());
    }     
    $conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../utils/images/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="../../styles/exibir.css">
    <script src="../../scripts/evento.js"></script>
    <script src="../../scripts/nav_bar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
    <script src="../../scripts/background-color.js"></script>
    <title>Editar</title>
</head>
<body>
    <?php include("../utils/navbar.html");?>
    <input id="id" type="hidden" value="<?php echo $id;?>">
    <input id="current_banner" type="hidden" value="<?php echo $banner;?>">
    <div id="container">

        <div class="image-block">
            <img id="image" src="<?php echo $banner;?>" alt="Banner do evento">
        </div>
        <div id="form">
            <div class="form-line">
                <label class="left-label">Nome do evento:</label>
                <input id="name" type="text" value="<?php echo $name;?>">
            </div>
            <div class="form-line">
                <label class="left-label">Data de in??cio:</label>
                <input type="datetime-local" id="start_date" onchange="update_min_end_date(this.value)" min="<?php echo $current_datetime;?>" value="<?php echo $start_datetime;?>">
            </div>
            <div class="form-line">
                <label class="left-label">Data de encerramento:</label>
                <input type="datetime-local" id="end_date" min="<?php echo $start_datetime;?>" value="<?php echo $end_datetime;?>">
            </div>
            <div class="form-line">
                    <label class="left-label">Tipo do evento:</label>
                    <select id="type_id">
                        <?php get_options() ?>
                    </select>
                </div>
            <div class="form-line">
                <input id="wifi" type="checkbox" <?php if($wifi) echo "checked" ;?>>
                <label>Wi-fi</label><br>
                <input id="free_parking" type="checkbox" <?php if($free_parking) echo "checked" ;?>>
                <label>Estacionamento gr??tis</label><br>
                <input id="free_drink" type="checkbox" <?php if($free_drink) echo "checked" ;?>>
                <label>Bebida gr??tis</label>
            </div>
            <div class="form-line">
                <div>
                    <label class="left-label">Descri????o do evento:</label>
                </div>
                <textarea id="description" rows="5" cols="46"><?php echo $description;?></textarea>
            </div>
            <div class="form-line">
                <label class="left-label">Banner do evento:</label>
                <input id="banner" type="file">
            </div>
        </div>
        <button id="main-btn" onclick="edit()">Salvar</button>
        <a href="./exibir.php?id=<?php echo $id ?>">
            <button id="secondary-btn">Cancelar</button>
        </a>
    </div>
</body> 
</html>