<?php
include "header.php";
?>
<h3 class="text-center">登入頁面</h3>
<div class="container text-center login">
    <form action="check.php" method="post">
        <div class="tip">
        <?php
            if($_GET['false']==1){
                echo "帳號或密碼錯誤";
            }
        ?>
        </div>
        <div class="my-3">
            帳號：<input type="acc" name="acc">
        </div>
        <div class="my-3">
            密碼：<input type="password" name="pw">
        </div>
        <input type="submit">
    </form>
</div>
<?php
    include "footer.php";
?>