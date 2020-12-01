<?php
include_once "base.php";
if(isset($_GET['orderby'])){
    //收到orderby這個變數時，設定cookie的值，藉以用來判斷排序方式
    switch ($_GET['orderby']){
        case "date":
            $rows=$pdo->query("select * from `invoices` order by date desc")->fetchAll();
            setcookie("order",'date',time()+3600);
        break;
        case "payment":
            $rows=$pdo->query("select * from `invoices` order by payment desc")->fetchAll();
            setcookie("order",'payment',time()+3600);
        break;
    }
}else if(isset($_COOKIE['order'])){
    //當cookie有設定時，以內容判斷排序方式
        switch ($_COOKIE['order']){
            case "date":
                $rows=$pdo->query("select * from `invoices` order by date desc")->fetchAll();
            break;
            case "payment":
                $rows=$pdo->query("select * from `invoices` order by payment desc")->fetchAll();
            break;
        }
}else if(isset($_GET['pd'])){
    //當網頁得到pd這個變數時，設定cookie儲存期數
        $year=explode("-",$_GET['pd'])[0];
        $period=explode("-",$_GET['pd'])[1];
        $rows=$pdo->query("select * from `invoices` where period={$period}")->fetchAll();
        setcookie("pd",$period,time()+3600);
}else if(isset($_GET['pd'])&&isset($_COOKIE['order'])){
    //當網頁得到pd以及order有儲存排序方式時
        $year=explode("-",$_GET['pd'])[0];
        $period=explode("-",$_GET['pd'])[1];
        $orderby=$_COOKIE['order'];
        echo "select * from `invoices` where period={$period}  order by {$orderby} desc";
        $rows=$pdo->query("select * from `invoices` where period={$period}  order by {$orderby} desc")->fetchAll();
}
else{
    //沒有收到變數時，找出全部的資料
    $rows=$pdo->query("select * from `invoices`")->fetchAll();
}
//以網址收到的參數判斷要顯示何時的發票以及依照甚麼排序
// if(isset($_GET['pd'])&&isset($_GET['orderby'])){
//     $year=explode("-",$_GET['pd'])[0];
//     $period=explode("-",$_GET['pd'])[1];
//     switch ($_GET['orderby']){
//         case "date":
//             $rows=$pdo->query("select * from `invoices` where period={$period} order by date desc")->fetchAll();
//             setcookie("order",'date',time()+3600);
//         break;
//         case "payment":
//             $rows=$pdo->query("select * from `invoices` where period={$period} order by payment desc")->fetchAll();
//             setcookie("order",'payment',time()+3600);
//         break;
//     }
// if(isset($_GET['pd'])){
//     $year=explode("-",$_GET['pd'])[0];
//     $period=explode("-",$_GET['pd'])[1];
//     $rows=$pdo->query("select * from `invoices` where period={$period}");
// }else if(isset($_COOKIE['order'])){
//     switch ($_COOKIE['order']){
//         case "date":
//             $rows=$pdo->query("select * from `invoices` order by date desc")->fetchAll();
//         break;
//         case "payment":
//             $rows=$pdo->query("select * from `invoices` order by payment desc")->fetchAll();
//         break;
//     }
// }
// else{
//     $rows=$pdo->query("select * from `invoices`")->fetchAll();
// }
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
        <td><a href="?do=invoice_list<?php 
        if(isset($_GET['pd'])){
            echo "&pd=".explode("-",$_GET['pd'])[0]."-".explode("-",$_GET['pd'])[1]."&orderby=date";
        }else{
            echo "&orderby=date";
        }
        ?>
        ">
        消費日期</a></td>
        <td><a href="?do=invoice_list<?php 
        if(isset($_GET['pd'])){
            echo "&pd=".explode("-",$_GET['pd'])[0]."-".explode("-",$_GET['pd'])[1]."&orderby=payment";
        }else{
            echo "&orderby=payment";
        }
        ?>
        ">
        消費金額</a></td>
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