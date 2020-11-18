<?php
//撰寫一支程式來模擬統一發票號碼，
//並將大量的號碼及發票資訊寫入資料庫以方便做系統測試

include_once "base.php";
echo "資料產生中";
echo date("Y-m-d H:i:s")."<br>";
for($i=0;$i<10000;$i++){

    $code=implode("",[chr(rand(65,90)),chr(rand(65,90))]);
    // echo $code;
    $number=str_pad(rand(0,99999999),8,'0',STR_PAD_LEFT);
    // echo $number;
    $payment=rand(1,20000);
    // echo $payment;
    $date=date("Y-m-d",rand(strtotime("2020-1-1"),strtotime("2020-12-31")));
    // echo $date."<br>";
    $period=ceil(explode("-",$date)[1]/2);
    // echo $period;
    $fdata=[
        'code'=>$code,
        'number'=>$number,
        'payment'=>$payment,
        'date'=>$date,
        'period'=>$period
    ];
    $sql="insert into invoices (`".implode("`,`",array_keys($fdata))."`) values('".implode("','",$fdata)."')";
    $pdo->exec($sql);
}    
echo "<hr>";
echo "資料新增完成";
echo date("Y-m-d H:i:s");

?>