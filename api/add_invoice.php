<?php
//撰寫新增消費發票的程式碼
//將發票的號碼及相關資訊寫入資料庫

include_once "../base.php";
$_SESSION['err']=[];
// $period=ceil((explode("-",$_POST['date'])[1])/2);
// echo $period;
echo "<pre>";
print_r($_POST);
echo "</pre>";
// echo "(`".implode("`,`",array_keys($_POST)) .",`period"."`) values('".implode("','",$_POST)."{$period}"."')";
check_date('date');
check_code('code');
check_num('number');
check_pay('payment');
print_r($_SESSION['err']);
// $sql="insert into invoices (`".implode("`,`",array_keys($_POST))."`) values('".implode("','",$_POST)."')";
errFeedBack('date');
errFeedBack('code');
errFeedBack('number');
errFeedBack('payment');

// $pdo->query($sql);


if(empty($_SESSION['err'])){
    // $pdo->exec($sql);
    header("location:../index.php?do=invoice_list");
}else{
    header("location:../index.php");
}
?>