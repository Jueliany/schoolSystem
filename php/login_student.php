<?php
    // 获取用户名
    // header("Content-Type: application/json");
    include "public/public_db.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $coon = new db();
    $sql="SELECT * from student WHERE student_id = '$username' and password = '$password'";
    $row = $coon->Query($sql, 2);
    // 找到数据
    if($row) {
      $arr = array("id" => $row["id"], "$username"=> $row["student_id"],"name" => $row["name"]);
      // 返回用户基本信息
      $array = array("code"=>"0", "msg"=> "", "data"=>  $arr);
      
    } else {
      $array = array("code"=>"1", "msg"=> "账号或者用户名错误！！");
    }
    echo json_encode($array);
  ?>