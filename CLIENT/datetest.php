<?php 
    $cdate = date("y-m-d");
    echo "CURERENT DATE".$cdate;
    echo '<br>';
    $duedate = date('y-m-d', strtotime("+30 days"));
    echo $duedate;
?>