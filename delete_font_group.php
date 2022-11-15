<?php
require('dbcon.php');
$group_id = $_GET['id'];
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // $group_title = $_POST['group_title_edit'];
    // $group_id = $_POST['group_id'];
    $font_group_sql = "delete from font_groups where id='$group_id'";
    $group_delete = mysqli_query($conn,$font_group_sql);
    $font_group_delete_sql = "delete from font_group_details where group_id='$group_id'";
    $group_details_delete = mysqli_query($conn,$font_group_delete_sql);
    // $last_id = mysqli_insert_id($conn);
    // var_dump($group_insert);
    // for($i=0; $i<count($_POST['font_name_edit']); $i++){
    //     $font_name = $_POST['font_name_edit'][$i];
    //     $font_id = $_POST['font_id_edit'][$i];
    //     $font_group_details_sql = "insert into font_group_details (group_id, font_name, font_id) values ('$group_id', '$font_name', '$font_id')";
    //     $group_details_insert = mysqli_query($conn,$font_group_details_sql);
    //     //var_dump($_POST['font_name'][$i]);
    // }
    if ($group_delete && $group_details_delete) {
        $res = [
            'status' => 200,
            'message' => 'Font group deleted successfully'
        ];
        echo json_encode($res);
    } else {
        $res = [
            'status' => 422,
            'message' => 'Font group not deleted'
        ];
        echo json_encode($res);
    }
// }