<?php
include "header.php";
?>
<div class="container text-center login my-5 py-5 col-6 animate__animated animate__fadeInDown row mx-auto">
    <h3 class="text-center col-12">登入頁面</h3>
        <form action="check.php" method="post" class="col-12">
            <div class="tip">
            <?php
                if(isset($_GET['false'])){
                    echo "帳號或密碼錯誤";
                }
            ?>
            </div>
            <div class="my-3">
                <div class="mb-3">帳號：</div>
                <input class="col-6" type="acc" name="acc" placeholder="rose">                
            </div>
            <div class="my-3">
                <div class="mb-3">密碼：</div>
                <input class="col-6" type="password" name="pw" placeholder="1234">
            </div>
            <input type="submit" value="登入">
        </form>
</div>
<?php
    include "footer.php";
?>