<?php
    //檢查登入資訊並導向default.php頁面
    include_once "base.php";
    print_r($_POST);
    $acc=$_POST['acc'];
    $pw=$_POST['pw'];
    $sql="select * from `login` where `acc`='$acc' && `pw`='$pw'";
    echo $sql;
    $check=$pdo->query($sql)->fetch();
    if(!empty($check)){
        $member_sql="select * from member where login_id='{$check['id']}'";
        echo $member_sql."<br>";
        $member=$pdo->query($member_sql)->fetch();
        $_SESSION['login']=$acc;
        header("location:default.php");
    }else{
        echo "登入失敗";
        header("location:index.php?false=1");
        
    }
    echo $_SESSION['login'];
?>