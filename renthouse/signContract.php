<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap/css/style.css">
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div style="margin-left:44%;margin-top:10%;">
<body style="background-image: url('img/3.jpg');">
<?php
$tenantTel=$_SESSION['account'];
//处理租客租房
$dbhost = 'localhost:3306';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = '';          // mysql用户名密码
$dbname = 'renthouse';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
if(! $conn )
{
    die('Could not connect: ' . mysqli_error());
}
//echo '数据库连接成功！';
$houseId=$Fare=$startDate=$endDate='';
if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $houseId=$_GET["orderHouseId"];
    $Fare=$_GET["orderPrice"]*0.05;
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $houseId=$_POST["orderHouseId"];
    $Fare=$_POST["orderPrice"];
    $startDate=$_POST["startDate"];
    $endDate=$_POST["endDate"];
    if($startDate==""){
        echo '<script type="text/javascript">
    alert("起始日期填写不能为空");
</script>';
        goto end;
    }else if($endDate==""){
        echo '<script type="text/javascript">
    alert("结束填写不能为空");
</script>';
        goto end;
    }else if($startDate>$endDate){
        echo '<script type="text/javascript">
    alert("日期填写顺序有误");
</script>';
        goto end;
    }
    $sql="insert into `contract`(`Fare`,`StartTime`,`EndTime`,`houseID`,`TenantTel`) values('$Fare','$startDate','$endDate','$houseId','$tenantTel');";
if(mysqli_query($conn,$sql)==TRUE){
    echo '<script type="text/javascript">
    alert("租赁信息提交成功，等待房主确认");
    location.href="UnrentHoustList.php";
    location.parent.href="tenant.php";
</script>';
}
//else echo "哈哈";
}
end:;
?>

<form method="post">
    <input id="orderHouseId" name='orderHouseId' value='<?php echo $houseId;?>' style='display: none;'></input>
    <h5>确定开始日期:</h5>
    <input type="date" name="startDate"/>
    <br><h5>确定结束日期:</h5>
    <input type="date" name="endDate"/>
    <br><h5>手续费:<?php echo $Fare;?></h5><input name='orderPrice' id="orderPrice" value='<?php echo $Fare;?>' style='display: none;'></input>
    <br>
    <button type="submit">确定</button>
</form>
    
</body>
</div>
</html>
