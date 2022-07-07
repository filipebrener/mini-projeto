<?php 

include("../database/connect.inc.php");

try {
    
    $id = $_GET['id']; 
    
    if($_GET['action'] == 'apagar'){
        $sql = "DELETE FROM evento WHERE id = $id";
        $conn->query($sql);
        header('Location: ../views/listagem.php');
        die();
    }
    
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE); //convert JSON into array
    
    
    $id = $input['id'];
    $name = $input['name'];
    $start_date = $input['start_date'];
    $end_date = $input['end_date'];
    $type = $input['type'];
    $wifi = $input['wifi'] ? 1 : 0;
    $free_parking = $input['free_parking'] ? 1 : 0;
    $free_drink = $input['free_drink'] ? 1 : 0;
    $description = $input['description'];
    $banner = $input['banner'];

    if($id){
        $sql = "UPDATE evento
                SET name = '$name', start_date = '$start_date', end_date = '$end_date', type = '$type', 
                    wifi = $wifi, free_parking = $free_parking, free_drink = $free_drink, description = '$description', banner = '$banner'
                WHERE id = $id";
    } else {
        $sql = "INSERT INTO evento (name, start_date, end_date, type, wifi, free_parking, free_drink, description, banner) 
                VALUES ('$name', '$start_date', '$end_date', '$type', $wifi, $free_parking, $free_drink, '$description', '$banner');";
    }


    $result = $conn->query($sql);
    echo $id ? $id : $conn->insert_id;
    $conn->close();

    } catch (Exception $e) {
        http_response_code(500);
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }

?>
