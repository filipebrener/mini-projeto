<?php
    include("../database/connect.inc.php");
    $id = $_GET['id'];
    $sql = "SELECT * FROM evento WHERE id = $id LIMIT 1";
    $result = $conn->query($sql);
    if($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $start_date = strtotime($row['start_date']);
        $end_date = strtotime($row['start_date']);
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
    <script src="../../scripts/evento.js"></script>
    <script src="../../scripts/nav_bar.js"></script>
    <script src="../../scripts/exibir.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
    <title>Exibir</title>
</head>
<body>
    <?php include("../utils/navbar.html");?>
    <h1>Evento</h1>
    <input id="id" type="hidden" value="<?php echo $id;?>">
    <div class="form-line">
        <img id="image" src="<?php echo $banner;?>" alt="Banner do evento">
    </div>
    <div class="form-line">
        <label class="left-label">Nome do evento:</label>
        <?php echo $name;?>
    </div>
    <div class="form-line">
        <label class="left-label">Data de início:</label>
        <?php echo date('d/M/Y',$start_date);?>
    </div>
    <div class="form-line">
        <label class="left-label">Data de encerramento:</label>
        <?php echo date('d/M/Y',$end_date);?>
    </div>
    <div class="form-line">
        <label class="left-label">Tipo do evento:</label>
        <?php echo $type;?>
    </div>
    <div class="form-line">
        <input id="wifi" type="checkbox" enabled="false" <?php if($wifi) echo "checked" ;?>>
        <label>Wi-fi</label><br>
        <input id="free_parking" type="checkbox" enabled="false"<?php if($free_parking) echo "checked" ;?>>
        <label>Estacionamento grátis</label><br>
        <input id="free_drink" type="checkbox" enabled="false" <?php if($free_drink) echo "checked" ;?>>
        <label>Bebida grátis</label>
    </div>
    <div class="form-line">
        <div>
            <label class="left-label">Descrição do evento:</label>
        </div>
        <?php echo $description;?>
    </div>
    <a href="editar.php?id=<?php echo $id;?>">
        <button>Editar</button>
    </a>
</body>
</html>