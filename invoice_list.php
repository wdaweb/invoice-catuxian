<?php
include_once "base.php";

$sql="select * from `invoices` order by date desc";

$rows=$pdo->query($sql)->fetchAll();

?>
<div class='row justify-content-around' style="list-style-type:none;padding:0">
    <li><a href="">1,2月</a></li>
    <li><a href="">3,4月</a></li>
    <li><a href="">5,6月</a></li>
    <li><a href="">7,8月</a></li>
    <li><a href="">9,10月</a></li>
    <li><a href="">11,12月</a></li>

</div>
<table class="table text-center">
    <tr>
        <td>發票號碼</td>
        <td>消費日期</td>
        <td>消費金額</td>
        <td>操作</td>
    </tr>
    <?php
        foreach($rows as $row){
    ?>
    <tr>
        <td><?=$row['code'].$row['number'];?></td>
        <td><?=$row['date'];?></td>
        <td><?=$row['payment'];?></td>
        <td>
            <a href="?do=edit_invoice&id=<?=$row['id'];?>">
                <button class="btn btn-sm btn-primary">編輯</button>
            </a>
            <a href="?do=del_invoice&id=<?=$row['id'];?>">
                <button class="btn btn-sm btn-danger">刪除</button>
            </a>
            <a class="text-light" href="?do=award&id=<?=$row['id'];?>">
                <button class="btn btn-sm btn-success">對獎</button>
            </a>
        </td>
    </tr>
    <?php
        }
    ?>
</table>