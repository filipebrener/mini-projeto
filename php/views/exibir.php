<?php
    include("../database/connect.inc.php");
    $id = $_GET['id'];
    $sql = "SELECT * FROM evento WHERE id = $id LIMIT 1";
    $result = $conn->query($sql);
    if($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $type = $row['type'];
        $banner = $row['banner'];
        $wifi = $row['wifi'];
        $free_parking = $row['free_parking'];
        $free_drink = $row['free_drink'];
        $description = $row['description'];
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
    <link rel="stylesheet" href="../../styles/evento.css">
    <script src="../../scripts/nav_bar.js"></script>
    <title>Exibir</title>
</head>
<body>
    <?php include("../utils/navbar.html");?>
    <h1>Evento</h1>
    <div class="form-line">
        <img src="<?php echo $banner;?>" alt="Banner do evento">
    </div>
    <div class="form-line">
        <label class="left-label">Nome do evento:</label>
        <input type="text" value="<?php echo $name;?>">
    </div>
    <div class="form-line">
        <label class="left-label">Data de início:</label>
            <input type="datetime" id="start-date" id="event-date" onchange="formatData('start-date')" value="<?php echo $start_date;?>">
    </div>
    <div class="form-line">
        <label class="left-label">Data de encerramento:</label>
            <input type="datetime" id="end-date" placeholder="dd-MM-yyyy" onchange="formatData('end-date')" value="<?php echo $end_date;?>">
    </div>
    <div class="form-line">
        <label class="left-label">Tipo do evento:</label>
        <input type="text" value="<?php echo $type;?>">
    </div>
    <div class="form-line">
        <label class="left-label">Banner do evento (imagem):</label>
        <input type="text" value="<?php echo $banner;?>">
    </div>
    <div class="form-line">
        <input type="checkbox" <?php if($wifi) echo "checked" ;?>>
        <label>Wi-fi</label><br>
        <input type="checkbox" <?php if($free_parking) echo "checked" ;?>>
        <label>Estacionamento grátis</label><br>
        <input type="checkbox" <?php if($free_drink) echo "checked" ;?>>
        <label>Bebida grátis</label>
    </div>
    <div class="form-line">
        <div>
            <label class="left-label">Descrição do evento:</label>
        </div>
        <textarea id="story" name="story" rows="5" cols="46"><?php echo $description;?></textarea>
    </div>
</body>
</html>