<?php
    include_once "../base.php";

    $pdo->exec("delete from invoices where id='{$_GET['id']}'");

?>
<body onload="top.close();">

</body>