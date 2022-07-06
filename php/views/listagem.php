<?php include("../database/connect.inc.php");?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/listagem.css">
    <link rel="icon" href="../utils/images/favicon.ico" type="image/ico">
    <script src="../../scripts/nav_bar.js"></script>
    <title>Listagem</title>
</head>
<body>
    <?php include("../utils/navbar.html"); ?>
    <input type="hidden" id="screen" value="listagem">
    <h1>Lista de eventos</h1>
    <div class="grid-container">
        <?php
            
            $itens_per_page = 8;
            $num_events = $conn->query("SELECT COUNT(*) as total FROM evento")->fetch_assoc()['total'];
            $num_pages = ceil($num_events/$itens_per_page);
            
            $page = ($_GET['page'] == null || $_GET['page'] <= 0) ? 1 : $_GET['page'];
            
            $start_index = ($page - 1) * $itens_per_page;

            $sql = "SELECT * FROM evento ORDER BY start_date, name LIMIT $start_index, $itens_per_page";
            $result = $conn->query($sql);

            const MAX_SIZE_DESCRIPTION = 52;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $start_date = strtotime($row['start_date']);
                    $description = $row['description'];
                    $banner = $row['banner'];
                    
                    $start_day = date('d', $start_date );
                    $start_month = date('M', $start_date );

                    if(strlen($description) > MAX_SIZE_DESCRIPTION){
                        $description = substr($description, 0, MAX_SIZE_DESCRIPTION - 1) . "...";
                    }

                    echo "
                    <a href='exibir.php?id=$id'>
                        <div class='grid-item' id='$id'>
                            <img src='$banner'><br>
                            <div class='description'>
                                $name<br>
                                $description<br>
                            </div>
                            <div class='calendar-mini'>
                                <div class='month'> $start_month </div>
                                <div class='day'> <strong> $start_day </strong> </div>
                            </div>
                        </div>
                    <a>";

                }
            }
            $conn->close();

        ?>

</div>
<div class="nav">
    <nav aria-label='Navegação de página'>
        <ul class='pagination'>
            <li class='page-item'><a class='page-link <?php if($page == 1) echo "disabled";?>' href='./listagem.php?page=<?php echo $page-1?>'>Anterior</a></li>
            <?php 
                for($i = 1;$i<=$num_pages;$i++){
                    $disabled = ($i != $page) ?  "" : "disabled";
                    echo "<li class='page-item'><a class='page-link $disabled' href='./listagem.php?page=$i'>$i</a></li>";
                }
                $disabled = $page + 1 <= $num_pages ? "" : "disabled";
                $next_page = $page + 1;
                echo "<li class='page-item'><a class='page-link $disabled' href='./listagem.php?page=$next_page'>Próximo</a></li>";
            ?>
        </ul>
    </nav>
</div>
</body>
</html>