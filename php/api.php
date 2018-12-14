<?php
    include "public/public_db.php";
    header('Content-Type: text/html;charset=utf-8');
    // 指定允许其他域名访问
    header('Access-Control-Allow-Origin:*');
    // 响应类型  
    header('Access-Control-Allow-Methods:POST');
    // 响应头设置  
    header('Access-Control-Allow-Headers:x-requested-with,content-type');
    
    require_once('login.php');
    require_once('student.php'); 
    require_once('reward.php'); 
    require_once('subjects.php'); 
    $api_url = @$_GET['api'];

    $login = new Login();
    $student = new Student();
    $reward = new Reward();
    $subjects = new Subjects();
    switch($api_url)//调用相应接口
    {
        case 'loginAdmin':echo $login -> loginAdmin();break;
        case 'loginStudent':echo $login -> loginStudent();break;
        case 'queryStudentList':echo $student -> queryStudentList();break;
        case 'addStudent':echo $student -> addStudent();break;
        case 'deleteStudent':echo $student -> deleteStudent();break;
        case 'updateStudent':echo $student -> updateStudent();break;
        case 'queryRewardList':echo $reward -> queryRewardList();break;
        case 'queryReward':echo $reward -> queryReward();break;
        case 'addReward':echo $reward -> addReward();break;
        case 'deleteReward':echo $reward -> deleteReward();break;
        case 'updateReward':echo $reward -> updateReward();break;
        case 'querySubjectsList':echo $subjects -> querySubjectsList();break;
        case 'querySubjects':echo $subjects -> querySubjects();break;
        case 'addSubjects':echo $subjects -> addSubjects();break;
        case 'deleteSubjects':echo $subjects -> deleteSubjects();break;
        case 'updateSubjects':echo $subjects -> updateSubjects();break;
    }
    
?>