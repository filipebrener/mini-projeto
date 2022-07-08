<?php 

    // yyyy-mm-ddThh:mm
    function get_date_time_format($date){
        return date('Y-m-d',$date).'T'.date('H:i',$date);
    }

?>