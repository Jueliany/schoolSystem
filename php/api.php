<?php
    header('Content-Type: text/html;charset=utf-8');
    // 指定允许其他域名访问
    header('Access-Control-Allow-Origin:*');
    // 响应类型  
    header('Access-Control-Allow-Methods:POST');
    // 响应头设置  
    header('Access-Control-Allow-Headers:x-requested-with,content-type');
    
    require_once('login.php');
     
    $api_url = @$_GET['api'];
    $login = new Login();
    if($api_url == 'loginAdmin'){
      echo $login -> loginAdmin();
    }
    elseif($api_url == 'loginStudent'){
      echo $login -> loginStudent();
    }
?>