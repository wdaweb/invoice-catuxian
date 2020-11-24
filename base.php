<?php
    
$dsn="mysql:host=localhost;dbname=invoice;charset=utf8";
$pdo=new PDO($dsn,'root','');

date_default_timezone_set("Asia/Taipei");
$awardStr=['頭','二','三','四','五','六'];
//啟用session
session_start();

$period_str=[
    1=>'1,2月',
    2=>'3,4月',
    3=>'5,6月',
    4=>'7,8月',
    5=>'9,10月',
    6=>'11,12月'
];
//判斷該欄位是否有值
function is_empty($field,$meg='此欄位不得為空'){
    if(empty($_POST[$field])){
        $_SESSION['err'][$field][]=$meg;
        print_r($_SESSION['err'][$field]);
    }
}

function length($field,$min,$max,$meg="長度不足"){
    if(strlen($_POST[$field])>$max || strlen($_POST[$field]) < $min){
        $_SESSION['err'][$field]['len']=$meg;
    }
}
function errFeedBack($field){
    if(!empty($_SESSION['err'][$field])){

        foreach($_SESSION['err'][$field] as $err){
            echo "<div style='font-size:12px;color:red'>";
            echo $err;
            echo "</div>";
        }
    }
}
?>