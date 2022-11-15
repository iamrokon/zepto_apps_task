<?php
require('dbcon.php');
$query = "select * from fonts";
$query_run = mysqli_query($conn, $query);
$result = [];
if(mysqli_num_rows($query_run)>0){
    foreach($query_run as $row){
        array_push($result, $row);
    }
    // header('Content-type: application/json');
    echo json_encode($result);
    // var_dump($result);
}else{
    $result = "422";
    echo json_encode($result);
}