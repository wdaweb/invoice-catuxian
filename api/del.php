<?php
    include_once "../base.php";

    $pdo->exec("delete from invoices where id='{$_GET['id']}'");

    header("location:../default.php?do=invoice_list");

?>