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
function check($data){
    switch ($data){
        case empty($data['date']):
            $_SESSION['err']['date'][]="日期欄位不得為空";
        case (strlen($data['code'])!=2||is_numeric('code')):
            $_SESSION['err']['code'][]="第一欄請輸入兩個大寫英文字母";
        case (strlen($data['number'])!=8&&!is_numeric($data['number'])):
            $_SESSION['err']['number'][]='第二欄請輸入8個0~9的數字';
        case empty($data['payment']):
            $_SESSION['err']['payment'][]='請輸入金額';
        
    }
}


function find($table,$def){

    global $pdo;
    $sql="select * from $table where";
    if(is_numeric($def)){

        $sql="select * from $table where id='$def'";
    }else if(is_array($def)){

        foreach($def as $key=>$value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql=$sql.implode("&&",$tmp);
    }
    else{
        $sql="select * from $table where $def";
    }
    $row=$pdo->query($sql)->fetch();

    return $row;
}

function all($table,...$arg){
    global $pdo;

    // echo gettype($arg);
    $sql="SELECT * FROM $table ";
    
    if(isset($arg[0]) && is_array($arg[0])&& !empty($arg[0])){
        //製作會在where後面的句子字串(陣列格式)
        foreach($arg[0] as $key=>$value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql=$sql."where".implode("&&",$tmp);
        // echo $sql."<br> ";
        // echo "arg[0]存在<br>";
        if(!empty($arg[1])){
            $sql=$sql.$arg[1];
            echo $sql."<br>";
        }
    }else{
        //製作非陣列的語句接在$sql後面
        $sql=$sql.$arg[0];
        echo $sql;
    }
    return $pdo->query($sql)->fetchAll();
}
function del($table,$id){
    global $pdo;
    $sql="delete from $table where ";
    if(is_array($id)){
        foreach($id as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);

        }
        $sql=$sql.implode(' && ',$tmp);
    }else{
        $sql=$sql . " id='$id' ";
    }
    //echo $sql;
    $row=$pdo->exec($sql);

    return $row;
}
function errFeedBack($field){
    if(!empty($_SESSION['err'][$field])){
        foreach($_SESSION['err'][$field] as $err){
            return $err;
            // echo "<div style='font-size:12px;color:red;>".$err."</div>";
        }
    }
}
function q($sql){
    global $pdo;
    return $pdo->query($sql)->fetchAll();
}
?>