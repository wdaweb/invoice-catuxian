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
function check_date($date){
    if(empty($_POST[$date])){
        $_SESSION['err'][$date][]="日期欄位不得為空";
        // print_r($_SESSION['err'][$field]);
    }
}
//判斷發票編號是否輸入正確
function check_code($code){
    if(strlen($_POST[$code])!=2||is_numeric($code)){
        $_SESSION['err'][$code][]="第一欄請輸入兩個大寫英文字母";
    }
}
function check_num($number){
    if(strlen($_POST[$number])!=8&&is_numeric($_POST[$number])!=1){
        $_SESSION['err'][$number][]='第二欄請輸入8個0~9的數字';    
    }
}
function check_pay($payment){
    if(empty($_POST[$payment])){
        $_SESSION['err'][$payment][]='請輸入金額';
    }
}
function length($field,$min,$max,$meg="長度不足"){
    if(strlen($_POST[$field])>$max || strlen($_POST[$field]) < $min){
        $_SESSION['err'][$field]['len']=$meg;
    }
}
function errFeedBack($field){
    if(!empty($_SESSION['err'][$field])){
        // echo "<div style='font-size:12px;color:red;>";
        // echo "<div>".$_SESSION['err'][$field][0]."</div>";
        // echo "</div>";
        foreach($_SESSION['err'][$field] as $err){
            echo $err;
        }
    }
}
?>