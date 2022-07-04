<?php 

include("../database/connect.inc.php");

try {
    
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE); //convert JSON into array


    $name = $input['name'];
    $start_date = $input['start_date'];
    $end_date = $input['end_date'];
    $type = $input['type'];
    $wifi = $input['wifi'] == 'on' ? true : false;
    $free_parking = $input['free_parking'] == 'on' ? true : false;
    $free_drink = $input['free_drink'] == 'on' ? true : false;
    $description = $input['description'];
    $banner = $input['banner'];

    $sql = "INSERT INTO evento (name, start_date, end_date, type, wifi, free_parking, free_drink, description, banner) 
    VALUES ('$name', '$start_date', '$end_date', '$type', $wifi, $free_parking, $free_drink, '$description', '$banner');";

    $result = $conn->query($sql);
    $conn->close();

    } catch (Exception $e) {
        http_response_code(500);
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }

?>
