<?php 

    include("../database/connect.inc.php");

    try {
        $action = $_GET['action'];
        switch ($action) {
            case 'create':
                $name = $_GET['name'];
                $sql = "INSERT INTO tipo (name) VALUES ('$name')";
                break;
            case 'delete':
                $id = $_GET['id'];
                $sql = "DELETE FROM tipo WHERE id = $id";
                break;
            case 'edit':
                $id = $_GET['id'];
                $name = $_GET['name'];
                $sql = "UPDATE tipo SET name = '$name' WHERE id = $id";
                break;
        }
        
        $conn->query($sql);
    } catch (Exception $e) {
        http_response_code(500);
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    } finally {
        $conn->close();
        header("Location: ../views/tipo.php");
    }

    function get_name($id){
        include("../database/connect.inc.php");
        $sql = "SELECT name FROM tipo WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['name'];
    }

    function get_options($event_type = null){
        include("../database/connect.inc.php");
        $sql = "SELECT * FROM tipo";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                if($event_type == $name){
                    echo "
                        <option selected value='$id'>$name</option>
                    ";    

                } else {
                    echo "
                        <option value='$id'>$name</option>
                    ";    
                }
            }
        }
    }


?>