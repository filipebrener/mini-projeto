<?php include("../database/connect.inc.php");?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../scripts/nav_bar.js"></script>
    <link rel="stylesheet" href="../../styles/exibir.css">
    <link rel="icon" href="../utils/images/favicon.ico" type="image/ico">
    <script src="../../scripts/type.js"></script>
    <title>Tipo do evento</title>
</head>
<body>
    <body style="background-color: #04aa6d0c;">
    <?php include("../utils/navbar.html");?>
    <input type="hidden" id="screen" value="tipo">
    <input type="hidden" id="id">
    <div id="container" style="background-color: #04aa6d36;">
        <div id="form">
                <h1>Novo de tipo de evento</h1><br>
                <div class="form-line">
                    <label class="left-label">Nome do tipo:</label>
                    <input id="name" type="text">
                </div>
            <div id="types_list">
                <h2>Tipos cadastrados</h2>
                <table>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>                    
                    <?php
                        $sql = "SELECT * FROM tipo";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['name'];
                                echo "
                                <tr>
                                    <td>$name</td>
                                    <td>
                                        <a href='../service/type_service.php?action=delete&id=$id'><button>Deletar</button></a>
                                        <button onclick='edit($id,".'"'.$name.'"'.")'>Editar</button>
                                    </td>
                                </tr>
                                ";    
                            }
                        }
                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    <button id="main-btn" onclick='save()'>Salvar</button>
    <button id="secondary-btn" onclick='cancel()' style="display: none;">Cancelar</button>

</body>
</html>

<style>
    div#types_list{
        margin: 30px;
    }
    
    table{
        width: 100%;
    }

    table,th, td {
        border: 1px solid black;
    }

    th, td {
        padding: 5px;
        text-align: left;   
    }

    tr:nth-child(odd) {background-color: #07aa6d36;}


</style>

