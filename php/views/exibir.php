<?php
    
    include("../database/connect.inc.php");
    include("../service/type_functions_service.php");
    
    try{
        $id = $_GET['id'];
        $sql = "SELECT * FROM evento WHERE id = $id LIMIT 1";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $start_date = strtotime($row['start_date']);
            $end_date = strtotime($row['end_date']);
            $type = get_name($row['type_id']);
            $banner = $row['banner'];
            $wifi = $row['wifi'] ? '' : '-off';
            $free_parking = $row['free_parking'] ? '' : ' Sem ';
            $free_drink = $row['free_drink'] ? '' : ' Sem ';
            $description = $row['description'];
            $start_day = date('d', $start_date );
            $start_month = date('M', $start_date );
        }     
        $conn->close();

    } catch (Exception $e) {
        http_response_code(500);
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../utils/images/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="../../styles/exibir.css">
    <link rel="stylesheet" href="../../styles/calendar.css">
    <script src="../../scripts/evento.js"></script>
    <script src="../../scripts/nav_bar.js"></script>
    <script src="../../scripts/background-color.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
    <title>Exibir</title>
</head>
<body>
    <?php include("../utils/navbar.html");?>
    <input id="id" type="hidden" value="<?php echo $id;?>">
    <input id="banner" type="hidden" value="<?php echo $banner;?>">
    <div id="container">
        <div class="image-block">
            <img id="image" src="<?php echo $banner;?>" alt="Banner do evento">
        </div>
        <div class="form-line">
            <h1><strong><?php echo $name;?></strong></h1>
        </div>
        <div id="event-calendar-container" class="form-line">
            <div class='calendar-mini'>
                <div class='month'> <?php echo $start_month ?></div>
                <div class='day'> <strong> <?php echo $start_day ?> </strong> </div>
            </div>
            <div id=event-calendar-description>
                De <?php echo date('d/M/Y &#x2022; H:i',$start_date)."h";?><br> à <?php echo date('d/M/Y &#x2022; H:i',$end_date)."h";?>
            </div>
        </div>
        <div class="form-line">
            <label>Tipo do evento:</label>
            <?php echo "&nbsp;$type";?>
        </div>
        <div class="form-line">

            <?php 
                echo "<i class='bi bi-wifi$wifi'></i>"; 
                if($wifi == '-off') echo " Sem ";
            ?>
            <label>&nbsp;Wi-fi</label><br>
                
            <i class="fas fa-car"></i>
            <?php echo $free_parking?>
            <label>&nbsp;Estacionamento grátis</label><br>
            
            <i class='fas fa-cocktail'></i>
            <?php echo $free_drink?>
            <label>&nbsp;Bebida grátis</label>
        </div>
        <div id="description">
            <label>Descrição do evento:</label>
            <p><?php echo $description;?></p>
        </div>
        <a href="editar.php?id=<?php echo $id;?>">
            <button id="main-btn">Editar</button>
        </a>
            <button onclick="delete_event()" id="secondary-btn">Apagar</button>
    </div>
</body>
</html>