<?php
require('dbcon.php');
$query = "select * from font_groups";
$query_run = mysqli_query($conn, $query);
$result = [];
if(mysqli_num_rows($query_run)>0){
    foreach($query_run as $row){
        $group_id = $row['id'];
        $query_detail = "select * from font_group_details where group_id='$group_id'";
        $query_detail_run = mysqli_query($conn, $query_detail);
        $fonts = "";
        $count = 0;
        foreach($query_detail_run as $row_detail){
            $fonts .= $row_detail['font_name'].", ";
            $count++;
            // var_dump($row_detail);
        }
        $fonts = rtrim($fonts,", ");
        $new_row = array();
        $new_row['id'] = $row['id'];
        $new_row['group_title'] = $row['group_title'];
        $new_row['fonts'] = $fonts;
        $new_row['count'] = $count;
        array_push($result, $new_row);
    }
    echo json_encode($result);
    // var_dump($result);
}else{
    $result = "422";
    echo json_encode($result);
}