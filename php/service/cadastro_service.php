<?php 

include("../database/connect.inc.php");

try {
    
    $name = $_POST['name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $type = $_POST['type'];
    $wifi = $_POST['wifi'] == 'on' ? true : false;
    $free_parking = $_POST['free_parking'] == 'on' ? true : false;
    $free_drink = $_POST['free_drink'] == 'on' ? true : false;
    $description = $_POST['description'];


    $sql = "INSERT INTO evento (name, start_date, end_date, type, wifi, free_parking, free_drink, description) 
    VALUES ('$name', '$start_date', '$end_date', '$type', $wifi, $free_parking, $free_drink, '$description');";

    $result = $conn->query($sql);
    $conn->close();

} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}

header("location: ../views/listagem.php");
?>
