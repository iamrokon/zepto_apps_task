<?php
require('dbcon.php');
$id = $_GET['id'];
$query = "select * from font_groups where id='$id'";
$query_run = mysqli_query($conn, $query);
$result = [];
$row = mysqli_fetch_assoc($query_run);
// if(mysqli_num_rows($query_run)>0){
//     foreach($query_run as $row){
        $group_id = $row['id'];
        $query_detail = "select * from font_group_details where group_id='$group_id'";
        $query_detail_run = mysqli_query($conn, $query_detail);
        // $row_detail = mysqli_fetch_assoc($query_detail_run);
//         $fonts = "";
        $group_details = [];
//         $count = 0;
        foreach($query_detail_run as $row_detail){
            array_push($group_details,$row_detail);
            // var_dump($row_detail);
        }
        $font_query = "select * from fonts";
        $font_query_run = mysqli_query($conn, $font_query);
        $fonts = [];
        foreach($font_query_run as $font_row){
            array_push($fonts, $font_row);
        }
            // var_dump($result);
        // var_dump($group_details);
//         $fonts = rtrim($fonts,", ");
        $new_row = array();
        $new_row['id'] = $row['id'];
        $new_row['group_title'] = $row['group_title'];
        $new_row['group_details'] = $group_details;
        $new_row['fonts'] = $fonts;
//         $new_row['count'] = $count;
        array_push($result, $new_row);
//     }
    echo json_encode($result);
//     // var_dump($result);
// }else{
//     $result = "422";
//     echo json_encode($result);
// }