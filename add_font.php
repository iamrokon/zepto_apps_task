<?php
require('dbcon.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(0 < $_FILES['font']['error']){
        echo 'error: '.$_FILES['font']['error'].'<br>';
        return;
    }else if(strtolower(explode(".",$_FILES['font']['name'])[1]) != 'ttf'){
        $res = [
            'status' => 422,
            'message' => 'Font type not matched'
        ];
        echo json_encode($res);
        return;
    }
    else{
        move_uploaded_file($_FILES['font']['tmp_name'],'fonts/'.$_FILES['font']['name']);
    }
    $font_name = explode(".",$_FILES['font']['name'])[0];
    $font_type = strtolower(explode(".",$_FILES['font']['name'])[1]);
    // var_dump($font_type);
    $location = 'fonts/'.$_FILES['font']['name'];
    $sql = "insert into fonts (font_name,location) values ('$font_name', '$location')";

    if ($conn->query($sql) === TRUE) {
        $res = [
            'status' => 200,
            'message' => 'Font inserted successfully'
        ];
        echo json_encode($res);
    } else {
        $res = [
            'status' => 422,
            'message' => 'Font not inserted'
        ];
        echo json_encode($res);
    }
}