<?php include("../database/connect.inc.php");?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/listagem.css">
    <script src="../../scripts/nav_bar.js"></script>
    <script src="../../scripts/listagem.js"></script>
    <title>Listagem</title>
</head>
<body>
    <?php include("../utils/navbar.html"); ?>
    <input type="hidden" id="screen" value="listagem">
    <h1>Listagem de Eventos</h1>
        <?php
            $sql = "SELECT * FROM evento ORDER BY start_date, name";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $start_date = $row['start_date'];
                    $end_date = $row['end_date'];
                    $type = $row['type'];
                    $wifi = $row['wifi'] ? "Sim" : "Não";
                    $free_parking = $row['free_parking'] ? "Sim" : "Não";
                    $free_drink = $row['free_drink'] ? "Sim" : "Não";
                    $description = $row['description'];
                    $banner = $row['banner'];
                    
                    echo "
                    <a href='exibir.php?id=$id'>
                        <div class='container' id='$id'>
                            <img src='$banner'><br>
                            Evento: $name<br>
                            Descrição: $description<br>
                            Data de início: $start_date
                        </div>
                    <a>";

                }
            }
            $conn->close();
        ?>

</body>
</html>