<?php
require('dbcon.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // var_dump(count($_POST['font_id']));
    // return;
    if(count($_POST['font_id'])>=2){
        $group_title = $_POST['group_title'];
        $font_group_sql = "insert into font_groups (group_title) values ('$group_title')";
        $group_insert = mysqli_query($conn,$font_group_sql);
        $last_id = mysqli_insert_id($conn);
        // var_dump($group_insert);
        for($i=0; $i<count($_POST['font_name']); $i++){
            $font_name = $_POST['font_name'][$i];
            $font_id = $_POST['font_id'][$i];
            $font_group_details_sql = "insert into font_group_details (group_id, font_name, font_id) values ('$last_id', '$font_name', '$font_id')";
            $group_details_insert = mysqli_query($conn,$font_group_details_sql);
            //var_dump($_POST['font_name'][$i]);
        }
        if ($group_insert && $group_details_insert) {
            $res = [
                'status' => 200,
                'message' => 'Font group inserted successfully'
            ];
            echo json_encode($res);
        } else {
            $res = [
                'status' => 422,
                'message' => 'Font group not inserted'
            ];
            echo json_encode($res);
        }
    }else{
        $res = [
            'status' => 'count_err',
            'message' => 'Font group not inserted'
        ];
        echo json_encode($res);
        return;
    }
}