<?php
    include_once "base.php";

    echo "你要對的發票是".$_GET['year']."年的";
    echo $period_str[$_GET['period']]."的發票<br>";

    //撈出某一期的發票
    echo "SELECT * FROM `invoices` WHERE `period`='{$_GET['period']}' && left(date,4)='{$_GET['year']}' order by date desc"."<br>";
    $all_invoices=$pdo->query("SELECT * FROM `invoices` WHERE `period`='{$_GET['period']}' && left(date,4)='{$_GET['year']}' order by date desc")->fetchAll();
    // echo count($all_invoices);
    // echo "<pre>";
    // print_r($all_invoices);
    // echo "SELECT * FROM `award_numbers` WHERE `period`='{$_GET['period']}' && `year`='{$_GET['year']}'";
    
    $award_numbers=$pdo->query("SELECT * FROM `award_numbers` WHERE `period`='{$_GET['period']}' && `year`='{$_GET['year']}'")->fetchAll(PDO::FETCH_ASSOC);

    if($award_numbers){
        echo "<pre>";
        print_r($award_numbers);
        echo "</pre>";
    }else{
        echo "該期發票還沒開獎";
    }
?>