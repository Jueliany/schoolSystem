<?php
  class db
  {
      public $host = "47.106.253.59";//定义默认连接方式
      public $account = "user";//定义默认用户名
      public $pass = "123456";//定义默认的密码
      public $db_name = "student";//定义默认的数据库名
      public $port = "3306";

      //查询
      public function Query($sql,$type=1)//两个参数：sql语句，判断返回1查询或是增删改的返回
      {
          $db = new mysqli($this->host,$this->account,$this->pass,$this->db_name,$this->port);
          $db->query("SET CHARACTER SET 'utf8'");//读库   
          $db->query("SET NAMES 'utf8'");//写库 
          $r = $db->query($sql);
          
          if($type == "1") {
              $array = array();
              while($row = $r -> fetch_assoc()) {
                array_push($array, $row);
              }
            return $array;//查询语句，返回数组
          } else if ($type == "2") {
            return $r->fetch_assoc();//查询语句，返回关联数组, 一条
          }
          else {
              return $r;
          }
      }


      //插入
      public function Insert($tableName,$data,$haveTime){
          $db = new mysqli($this->host,$this->account,$this->pass,$this->db_name,$this->port);
          $db->query("SET CHARACTER SET 'utf8'");//读库   
          $db->query("SET NAMES 'utf8'");//写库 
          $arrayKeys = array_keys($data);
          $arrayValues = array_values($data);
          $kl = "";
          $vl = "";
          $num = count($arrayKeys); 
          for($i=0;$i<$num;++$i){ 
            if($i != $num-1){
              $kl = $kl . $arrayKeys[$i] . ","; 
            }else{
              if($haveTime){
                $kl = $kl . $arrayKeys[$i].",created_time" ; 
              }else{
                $kl = $kl . $arrayKeys[$i] ; 
              }
              
            }
          } 
          for($i=0;$i<$num;++$i){ 
            if($i != $num-1){
              $vl = $vl . "'".$arrayValues[$i] ."'". ","; 
            }else{
              if($haveTime){
                $vl = $vl . "'".$arrayValues[$i]."'".",now()" ; 
              }else{
                $vl = $vl . "'".$arrayValues[$i]."'" ; 
              }
            }
          } 
          $conn = new db();
          $sql = "INSERT INTO $tableName (".$kl.") VALUES (".$vl.")";
          $result = "";
          if ($db->query($sql) === TRUE) {
              $result = array("code"=>"0", "msg"=> "插入成功");;
          } else {
              $result = array("code"=>"1", "msg"=> "插入失败");;
          }
          return json_encode($result);
          
      }

      //删除
      public function Delete($tableName,$data){
          $db = new mysqli($this->host,$this->account,$this->pass,$this->db_name,$this->port);
          $db->query("SET CHARACTER SET 'utf8'");//读库   
          $db->query("SET NAMES 'utf8'");//写库 
          $key = array_keys($data)[0];
          $value = array_values($data)[0];
         
          $conn = new db();
          $sql = "delete from $tableName where $key = $value";
          $result = "";
          if ($db->query($sql) === TRUE) {
              $result = array("code"=>"0", "msg"=> "删除成功");
          } else {
              $result = array("code"=>"1", "msg"=> "删除失败");
          }
          return json_encode($result);
          
      }

      //x修改
      public function Update($tableName,$data,$needTime){
          $db = new mysqli($this->host,$this->account,$this->pass,$this->db_name,$this->port);
          $db->query("SET CHARACTER SET 'utf8'");//读库   
          $db->query("SET NAMES 'utf8'");//写库 
          $arrayKeys = array_keys($data);
          $arrayValues = array_values($data);
          $kl = "";
          $key = $arrayKeys[0];
          $value = $arrayValues[0];
          $num = count($arrayKeys); 
          for($i=1;$i<$num;++$i){ 
            if($i != $num-1){
              $kl = $kl . $arrayKeys[$i]. "='".$arrayValues[$i] ."'" . ","; 
            }else{
              if($needTime == true){
                $kl = $kl . $arrayKeys[$i]. "='".$arrayValues[$i] ."'".",change_time=now()" ; 
              }else{
                $kl = $kl . $arrayKeys[$i]. "='".$arrayValues[$i] ."'" ; 
              }
              
            }
          } 
          
          $conn = new db();
          $sql = "update $tableName  set $kl where $key = '$value'";
          $result = "";
          if ($db->query($sql) === TRUE) {
              $result = array("code"=>"0", "msg"=> "修改成功");;
          } else {
              $result = array("code"=>"1", "msg"=> "修改失败");;
          }
          return json_encode($result);
          
      }

  }
  
?>