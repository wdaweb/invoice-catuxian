<?php 
    include "header.php";
    include_once "base.php";
?>

<h3 class="text-center pt-3">統一發票對獎與紀錄</h3>

<div class="container col-lg-8">
    <div class="col-md-12 d-flex justify-content-around mx-auto border p-1 mt-3">
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
            <a href="?do=main">新增發票</a>
        </div>
    </div>
    <div class="col-md-12 d-flex justify-content-around mx-auto flex-column border p-3">
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
<?php include "footer.php";?>
<?php $_SESSION['err']=[];?>