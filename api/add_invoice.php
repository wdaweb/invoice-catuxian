<?php
//撰寫新增消費發票的程式碼
//將發票的號碼及相關資訊寫入資料庫

include_once "../base.php";

echo "<pre>";
print_r(array_keys($_POST));
echo "</pre>";
echo implode("','",$_POST);


$sql="insert into invoices (`".implode("`,`",array_keys($_POST))."`) values('".implode("','",$_POST)."')";

$pdo->query($sql);

header("location:../index.php?do=invoice_list");

?>