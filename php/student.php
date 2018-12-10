<?php
// include "public/public_db.php";
    class Student{
      //查询学生
      function queryStudentList(){
        $coon = new db();
        $kl = "";
        $postData = $_POST['data'];
        $data = json_decode($postData,true);
        if(count($data)>0){
          $arrayKeys = array_keys($data);
          $arrayValues = array_values($data);
          $num = count($arrayKeys); 
          for($i=0;$i<$num;++$i){ 
            if($i != $num-1){
              $kl = $kl ." and stu.". $arrayKeys[$i]. "='".$arrayValues[$i] ."'" . ","; 
            }else{
              $kl = $kl ." and stu.". $arrayKeys[$i]. "='".$arrayValues[$i] ."'" ; 
            }
          } 
        }
          
        $sql="SELECT * from student stu,department dep,science sci,class cla where stu.department_id = dep.id and stu.science_id = sci.id and stu.class_id = cla.id  $kl";
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
        // return  $sql;
      }

      //增加学生
      function addStudent(){
        $postData = $_POST['data'];
        $data = json_decode($postData,true);
        $coon = new db();
        return $coon->Insert("student",$data,true);
      }

      //删除学生
      function deleteStudent(){
        $postData = $_POST['data'];
        $data = json_decode($postData,true);
        $coon = new db();
        return $coon->Delete("student",$data);
      }

      //修改学生信息
      function updateStudent(){
        $postData = $_POST['data'];
        $data = json_decode($postData,true);
        $coon = new db();
        return $coon->Update("student",$data,false);
      }

    }
      
    
  ?>