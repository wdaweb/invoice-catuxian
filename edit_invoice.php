<?php
    include "base.php";
    $sql="select * from `invoices` where id='{$_GET['id']}'";
    $inv=$pdo->query($sql)->fetchall();
    echo "<pre>";
        print_r($inv);
    echo "</pre>";
?>