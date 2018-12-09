<?php
// include "public/public_db.php";
    class Student{
      function queryStudentList(){
        $coon = new db();
        $sql="SELECT * from student stu,department dep,science sci,class cla where stu.department_id = dep.id and stu.science_id = sci.id and stu.class_id = cla.id";
        $row = $coon->Query($sql, 1);
        // 找到数据
        if($row) {
           // $arr = array($row);
          // 返回用户基本信息
          $array = array("code"=>"0", "msg"=> "成功", "data"=> $row );
          
        } else {
          $array = array("code"=>"1", "msg"=> "查无数据");
        }
        return json_encode($array);
      }
    }
      
    
  ?>