<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>統一發票紀錄及對獎系統</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>


<h3 class="text-center pt-3">統一發票對獎與紀錄</h3>

<div class="container">
    <div class="col-lg-8 col-md-12 d-flex justify-content-around mx-auto border p-1 mt-3">
        <?php
        $month = [
            1 => "1,2月",
            2 => "3,4月",
            3 => "5,6月",
            4 => "7,8月",
            5 => "9,10月",
            6 => "11,12月",
        ];
        $m = ceil(date("m") / 2);
        ?>
        <div class="text-center"><?= $month[$m]; ?></div>
        <div class="text-center">
            <a href="?do=invoice_list">當期發票</a>
        </div>
        <div class="text-center">
            <a href="?do=award_numbers">對獎</a>
        </div>
        <div class="text-center">
            <a href="?do=add_awards">輸入獎號</a>
        </div>
        <div class="text-center">
            <a href="index.php">回首頁</a>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 d-flex justify-content-around mx-auto border p-3">
    <?php
    if(isset($_GET['do'])){
        $file=$_GET['do'].".php";
        include $file;
    }else{
        include "main.php";
    }
    ?>
    </div>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>