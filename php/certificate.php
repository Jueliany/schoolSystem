<?php
// include "public/public_db.php";
    class Certificate{
      //查询课程
      function queryCertificateList(){
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
              $kl = $kl ." and ". $arrayKeys[$i]. "='".$arrayValues[$i] ."'" . ""; 
            }else{
              $kl = $kl ." and ". $arrayKeys[$i]. "='".$arrayValues[$i] ."'" ; 
            }
          } 
        }
          
        $sql="SELECT * from certificate ce,student stu,science sci where stu.student_id=ce.stu_id and  stu.science_id = sci.science_id $kl";
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

      function queryCertificate(){
        $coon = new db();
        $kl = "";
        $postData = $_POST['data'];
        $data = json_decode($postData,true);
        if(count($data)>0){
          $arrayKeys = array_keys($data);
          $arrayValues = array_values($data);
          $num = count($arrayKeys); 
          $kl = $kl ."". $arrayKeys[0]. "='".$arrayValues[0] ."'" ; 
        }
        
        $sql="SELECT * from certificate ce where  $kl";
        $row = $coon->Query($sql, 2);
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

      //增加课程
      function addCertificate(){
        $postData = $_POST['data'];
        $data = json_decode($postData,true);
        $coon = new db();
        return $coon->Insert("certificate",$data,false);
      }

      //删除课程
      function deleteCertificate(){
        $postData = $_POST['data'];
        $data = json_decode($postData,true);
        $coon = new db();
        return $coon->Delete("certificate",$data);
      }

      //修改学生课程
      function updateCertificate(){
        $postData = $_POST['data'];
        $data = json_decode($postData,true);
        $coon = new db();
        return $coon->Update("certificate",$data,false);
      }

    }
      
    
  ?>