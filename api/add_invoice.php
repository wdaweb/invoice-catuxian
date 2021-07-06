<?php
//撰寫新增消費發票的程式碼
//將發票的號碼及相關資訊寫入資料庫

include_once "../base.php";
$_SESSION['err']=[];
$period=ceil((explode("-",$_POST['date'])[1])/2);
// echo $period;
// echo "<pre>";
// print_r($_POST);
echo "</pre>";

check($_POST);
// print_r($_SESSION['err']);
$sql="INSERT INTO `invoices`(`".implode("`,`",array_keys($_POST)) ."`,`period"."`) values('".implode("','",$_POST)."','{$period}"."')";


echo errFeedBack('date');
echo "<br>";
echo errFeedBack('code');
echo "<br>";
echo errFeedBack('number');
echo "<br>";
echo errFeedBack('payment');

if(empty($_SESSION['err'])){
    // $pdo->query($sql);
    $pdo->exec($sql);
    header("location:../default.php?do=invoice_list");
}else{
    header("location:../default.php");
}
?>