<?php
    //檢查登入資訊並導向default.php頁面
    print_r($_POST);
    
    if($_POST['acc']=='jack'&&$_POST['pw']=='1234'){
        echo "登入成功";
        header("location:default.php");
    }else{
        echo "登入失敗";
    }
?>