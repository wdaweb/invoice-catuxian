<?php
include "../base.php";

$row1=find('invoices',22);
echo "<pre>";
print_r($row1);
echo "</pre>";
$row1['code']="AA";
$row1['number']="11111111";
// save(`table`,1);
update('invoices',$row1);

save(`table`,$row2);

function update($table,$array){
    global $pdo;
    $sql="update $table set";
    foreach($array as $key => $value){
        if($key!='id'){
            $tmp[]=sprintf("`%s`=`%s`",$key,$value);
        }
    }
    $sql=$sql.implode(",",$tmp)."where `id`='{$array['id']}'";
    echo $sql;
    // $pdo->exec($sql);
}
function insert($table,$array){
    global $pdo;
    $sql="insert into $table(`".implode("`,`",array_keys($array))."`) values('".implode("','",$array)."')";
    echo $sql;
    // $pdo->exec($sql);
}
function save($table,$array){
    if(isset($array)){
        if(isset($array['id'])){
            //update
            update($table,$array);
        }else{
            //insert
            insert($table,$array);
        }
    }else{
        echo "Notice:函式save()的第二個參數必須是陣列";
    }
}

?>