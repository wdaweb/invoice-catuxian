<?php
    include_once "base.php";

    echo "你要對的發票是".$_GET['year']."年的";
    echo $period_str[$_GET['period']]."的發票<br>";

    //撈出某一期的發票
    // echo "SELECT * FROM `invoices` WHERE `period`='{$_GET['period']}' && left(date,4)='{$_GET['year']}' order by date desc"."<br>";
    $all_invoices=$pdo->query("SELECT * FROM `invoices` WHERE `period`='{$_GET['period']}' && left(date,4)='{$_GET['year']}' order by date desc")->fetchAll();
    // echo count($all_invoices);
    // echo "<pre>";
    // print_r($all_invoices);
    // echo "SELECT * FROM `award_numbers` WHERE `period`='{$_GET['period']}' && `year`='{$_GET['year']}'";
    
    $award_numbers=$pdo->query("SELECT * FROM `award_numbers` WHERE `period`='{$_GET['period']}' && `year`='{$_GET['year']}'")->fetchAll(PDO::FETCH_ASSOC);

    if($award_numbers){
        
        $all_res=-1;
        foreach($all_invoices as $inv){
            $number=$inv['number'];
            
            //找出獎號
            /**
             * 1.確認期數->目前的發票的日期做分析
             * 2.得到期數的資料後->撈出該期的開獎獎號
             * 
             */
            $date=$inv['date'];
            //explode('-',$date)取得日期資料的陣列,陣列的第二個元素就是月
            //月份就可以推算期數,有了期數及年份就可以找到開獎的號碼
            // $array=explode('-',$date)
            // $month=$array[1]
            // $period=ceil($month/2)
            $year=explode('-',$date)[0];
            $period=ceil(explode('-',$date)[1]/2);
            //echo "select * from award_numbers where year='$year' && period='$period'";
            // $awards=$pdo->query("select * from award_numbers where year='$year' && period='$period'")->fetchALL();
            
            
            // echo "<pre>";
            // print_r($awards);
            // echo "</pre>";
            
        
            foreach($award_numbers as $award){
                switch($award['type']){
                    case 1:
                        //特別號=我的發票號碼
            
            
                        if($award['number']==$number){
                            echo "<br>號碼=".$number."<br>";
                            echo "<br>中了特別獎<br>";
                            $all_res=1;
                        }
                    break;
                    case 2:
            
                        if($award['number']==$number){
                            echo "<br>號碼=".$number."<br>";
                            echo "中了特獎<br>";
                            $all_res=1;
                        }
            
                    break;
                    case 3:
                        $res=-1;
                        for($i=5;$i>=0;$i--){
                            $target=mb_substr($award['number'],$i,(8-$i),'utf8');
                            $mynumber=mb_substr($number,$i,(8-$i),'utf8');
                            if($target==$mynumber){
                                $res=$i;
                            }else{
                            break;
                            }
                        }
                        //判斷最後的獎項
                        if($res!=-1){
                            echo "<br>號碼=".$number."<br>";
                            echo "中了{$awardStr[$res]}獎<br>";
                            $all_res=1;
                        }
                    break;
                    case 4:
                        if($award['number']==mb_substr($number,5,3,'utf8')){
                            echo "<br>號碼=".$number."<br>";
                            $all_res=1;
                            echo "中了增開六獎";
                        }
                    break;
                }
            }        
        }
                // if($all_res==-1){
                //     echo "很可惜，都沒有中";
                // }
    }else{
        echo "該期發票還沒開獎";
    }
?>