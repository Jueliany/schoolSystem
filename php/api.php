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
    require_once('certificate.php'); 
    require_once('employment.php'); 
    require_once('CET.php'); 
    require_once('match.php'); 
    $api_url = @$_GET['api'];

    $login = new Login();
    $student = new Student();
    $reward = new Reward();
    $certificate = new certificate();
    $employment = new employment();
    $CET = new CET();
    $match = new Match();

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
        case 'queryCertificateList':echo $certificate -> queryCertificateList();break;
        case 'queryCertificate':echo $certificate -> queryCertificate();break;
        case 'addCertificate':echo $certificate -> addCertificate();break;
        case 'deleteCertificate':echo $certificate -> deleteCertificate();break;
        case 'updateCertificate':echo $certificate -> updateCertificate();break;
        case 'queryEmploymentList':echo $employment -> queryEmploymentList();break;
        case 'queryEmployment':echo $employment -> queryEmployment();break;
        case 'addEmployment':echo $employment -> addEmployment();break;
        case 'deleteEmployment':echo $employment -> deleteEmployment();break;
        case 'updateEmployment':echo $employment -> updateEmployment();break;
        case 'queryCETList':echo $CET -> queryCETList();break;
        case 'addCET':echo $CET -> addCET();break;
        case 'deleteCET':echo $CET -> deleteCET();break;
        case 'updateCET':echo $CET -> updateCET();break;
        case 'queryMatchList':echo $match -> queryMatchList();break;
        case 'addMatch':echo $match -> addMatch();break;
        case 'deleteMatch':echo $match -> deleteMatch();break;
        case 'updateMatch':echo $match -> updateMatch();break;
    }
    
?>