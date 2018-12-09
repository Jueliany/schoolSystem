<?php
    // 获取用户名
    // header("Content-Type: application/json");
    class Login{

      //管理员登陆
      function loginAdmin(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $coon = new db();
        $sql="SELECT * from admin WHERE username = '$username' and password = '$password'";
        $row = $coon->Query($sql, 2);
        // 找到数据
        if($row) {
          $arr = array("id" => $row["id"], "username"=> $row["username"],"name" => $row["name"]);
          // 返回用户基本信息
          $array = array("code"=>"0", "msg"=> "", "data"=>  $arr);
          
        } else {
          $array = array("code"=>"100", "msg"=> "账号或者用户名错误！！");
        }
        return json_encode($array);
      }

      // 学生登陆
      function loginStudent(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $coon = new db();
        $sql="SELECT * from student WHERE student_id = '$username' and password = '$password'";
        $row = $coon->Query($sql, 2);
        // 找到数据
        if($row) {
          $arr = array("id" => $row["id"], "username"=> $row["student_id"],"name" => $row["name"]);
          // 返回用户基本信息
          $array = array("code"=>"0", "msg"=> "", "data"=>  $arr);
          
        } else {
          $array = array("code"=>"1", "msg"=> "账号或者用户名错误！！");
        }
        return json_encode($array);
      }
       
    }
    
  ?>