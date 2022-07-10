<?php 

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