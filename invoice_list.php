<?php
include_once "base.php";

        
if(isset($_GET['pd'])){
    //當收到pd這個變數時，會找出該期的資料
    $year=explode("-",$_GET['pd'])[0];
    $period=explode("-",$_GET['pd'])[1];
    $rows=$pdo->query("select * from `invoices` where period={$period} order by date desc")->fetchAll();
    setcookie("pd",$_GET['pd'],time()+3600);
}else if(isset($_COOKIE['pd'])){
    //當
    $year=explode("-",$_COOKIE['pd'])[0];
    $period=explode("-",$_COOKIE['pd'])[1];
    $rows=$pdo->query("select * from `invoices` where period={$period}  order by date desc")->fetchAll();
}
else{
    //沒有收到變數時，找出全部的資料
    $rows=$pdo->query("select * from `invoices` order by date desc")->fetchAll();
    echo "select * from `invoices` order by date desc";
}

?>
<div class='row justify-content-around' style="list-style-type:none;padding:0">
    <li><a href="?do=invoice_list&pd=<?=date('Y');?>-1">1,2月</a></li>
    <li><a href="?do=invoice_list&pd=<?=date('Y');?>-2">3,4月</a></li>
    <li><a href="?do=invoice_list&pd=<?=date('Y');?>-3">5,6月</a></li>
    <li><a href="?do=invoice_list&pd=<?=date('Y');?>-4">7,8月</a></li>
    <li><a href="?do=invoice_list&pd=<?=date('Y');?>-5">9,10月</a></li>
    <li><a href="?do=invoice_list&pd=<?=date('Y');?>-6">11,12月</a></li>

</div>

<table class="table text-center">
    <tr>
        <td>序號</td>
        <td>發票號碼</td>
        <td>消費日期</td>
        <td>消費金額</td>
        <td>操作</td>
    </tr>
    <?php
            if(isset($_GET['pageitems'])){
                $under=($_GET['pageitems']-1)*25+1;
                $above=$_GET['pageitems']*25;
            }else{
                $under=1;
                $above=25;
            }
            for($i=$under;$i<=$above&&$i<=count($rows);$i++){
            ?>
    <tr>
        <td><?=$i?></td>
        <td><?=$rows[$i-1]['code'].$rows[$i-1]['number'];?></td>
        <td><?=$rows[$i-1]['date'];?></td>
        <td><?=$rows[$i-1]['payment'];?></td>
        <td>
            <a href="?do=edit_invoice&id=<?=$rows[$i-1]['id'];?>">
                <button class="btn btn-sm btn-primary">編輯</button>
            </a>
            <a href="?do=del_invoice&id=<?=$rows[$i-1]['id'];?>">
                <button class="btn btn-sm btn-danger">刪除</button>
            </a>
            <a class="text-light" href="?do=award&id=<?=$rows[$i-1]['id'];?>">
                <button class="btn btn-sm btn-success">對獎</button>
            </a>
        </td>
    </tr>
    <?php
            
        }
    ?>
</table>
<ul class="pagination mx-auto">
<?php
    $pagecount=ceil(count($rows)/25);//判斷需要印出的列數
    for($i=1;$i<=$pagecount;$i++){
        echo "<li class='page-item'><a href='?pageitems={$i}&do=invoice_list' class='page-link'>{$i}</a></li>";
    }
?>
</ul>