<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>萬年曆</title>
    <style>
    body{
        font-family: Arial, "Microsoft JhengHei", sans-serif;
        box-sizing: border-box;
        color: #333;
        background-image: url("images/girl01-2.jpg");
        background-repeat: no-repeat;
        background-position: 90% -5%;
    }
    .calendar{
        display: inline-block;
        position: relative;
        margin-top: 48px;
        margin-left:30px;
    }
    h3{
        float: left;
        margin: 10px 20px;
        color: green;
    }
    table{
        width: 600px;
        height: 400px;
        border-collapse: collapse;
        border-radius: 20px;
        box-shadow: 0 0 12px #777;
        background: white;
        opacity: 0.9;
    }
    th, td{
        border: 1px solid #ccc;
    }
    th{
        text-align: center;
    }
    td{
        padding-left: 10px;
        background-color:#efefef;
    }
    th, td:hover{
        background-color:#c3e6e5;
    }
    .link{
        margin: 20px auto;
        
        text-align: center;
        
    }
    a{
        text-decoration: none;
        padding: 10px 15px;
        border: 1px solid #ccc;
        border-radius: 50px;
        box-shadow: inset 0 0 8px #777;
    }
    </style>
</head>
<body>
<?php
if(isset($_GET["year"])){
    $y = $_GET["year"];
}else{
    $y = date("Y");
}
 

$m = date("m");

if(isset($_GET["month"])){
    $m = $_GET["month"];
 }
    if($m>=12){   
        $nextY=$y+1;
        $nextM=1;
    }else{
        $nextY=$y;
        $nextM=$m+1;
    }
    if($m<=1){ 
        $prevY=$y-1;
        $prevM=12;
    }else{
        $prevY=$y-1;
        $prevM=$m-1;
    }
?>
<div class="calendar">
    <h3><?=$y;?> 年</h3>
    <h3><?=$m;?> 月</h3>
    <div style="clear:both"></div>
<table>
    <tr>
        <th style="background: lightpink;">日</th>
        <th>一</th>
        <th>二</th>
        <th>三</th>
        <th>四</th>
        <th>五</th>
        <th style="background: lightpink;">六</th>
    </tr>
  
    <?php
$firstDay="$y-$m-01";
$firstDayWeek=date("w",strtotime($firstDay));
$monthDays=date("t",strtotime($firstDay));

for($i=0;$i<6;$i++){
    echo "<tr>";
    for($j=0;$j<7;$j++){
        if($i==0 && $j<$firstDayWeek){
            echo "<td>";
            echo "</td>";
        }else{
            echo "<td>";
            $num=$i*7+$j+1-$firstDayWeek;
            if($num<=$monthDays){
                echo $num;
            }
            echo "</td>";
        }
    }
    echo "</tr>";   
}    
?>
    </table>
    
    <div class="link">
    <a href="index.php?month=<?php echo $prevM;?>&year=<?=$y?>">上一月</a>
    <a href="index.php?month=<?php echo $nextM;?>&year=<?=$y?>">下一月</a>
    </div>  
    </div>
</body>
</html>