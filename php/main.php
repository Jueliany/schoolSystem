<?php
header('Content-Type: text/html;charset=utf-8');
include "public/public_db.php";
class Main{
    // 配置数据库连接
    // 测试接口
    function test(){
      $a = $_POST['a'];
        return json_encode(array('error' => 200, 'msg' => '接口连接成功','a'=>$a));
      }
    // 测试数据库查询
    function testSql(){
      // 获取post过来的data
      $id = $_POST['id'];
      // 判断是否传值
      if(!$id){
        return json_encode(array('error' => 500, 'msg' => '参数缺失'));
      }
      // 定义数据库连接
      $conn = new db();
      // 建立数据库查询语句
      $search = "SELECT * FROM `test` WHERE `id` = $id";
      // $search = "SELECT * FROM `test`";      
      // 执行数据库查询语句(返回查询结果)
      $result = $conn -> query($search);
      // 遍历结果成数组
      if(!$result) {
        return json_encode(array('error' => 444, 'msg' => '无数据'));
      } else {
        while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
          $arr[]=$row;
        }
        // 输出查询结果
        return json_encode(array('error' => 200, 'data' => $arr));
      }
    }
}
?>