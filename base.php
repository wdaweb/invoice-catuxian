<?php
    
$dsn="mysql:host=localhost;dbname=invoice;charset=utf8";
$pdo=new PDO($dsn,'root','');

date_default_timezone_set("Asia/Taipei");
session_start();
$awardStr=['頭','二','三','四','五','六'];

$period_str=[
    1=>'1,2月',
    2=>'3,4月',
    3=>'5,6月',
    4=>'7,8月',
    5=>'9,10月',
    6=>'11,12月'
];
?>