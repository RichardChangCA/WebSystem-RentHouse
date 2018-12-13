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
<div style="margin-top: 4%;">
<body style="background-image: url('img/3.jpg');">
<?php error_reporting(0);
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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $id=$_POST["id"];
    $sql="delete from `check` where ID='$id';";
    if(mysqli_query($conn,$sql)==TRUE){
      echo "<script type='text/javascript'>alert('取消成功');//location.reload();</script>";
    }
}
$Name=$Age=$Gender='';
$tenantTel=$_SESSION['account'];
$sql="select Date,verify,ID,Address,Price,ownerTel,hostName,Fare from checkView where Tel='$tenantTel'";
mysqli_query($conn,'set names utf8');
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>    
<table class="table">
  <caption>预约看房信息</caption>
  <thead>
    <tr>
      <th>地址</th>
      <th>价格</th>
      <th>手续费</th>
      <th>看房日期</th>
      <th>房东电话</th>
      <th>房东姓名</th>
      <th>处理进度</th>
      <th>取消看房预约</th>
    </tr>
  </thead>
  <tbody>

<?php
$i=0;
$n=mysqli_num_rows($result);
for(;$i<$n;$i++){
  if($row['verify']=='0'){
    $ver="未处理";
    $signal="danger";
  }
  else{
    $ver="已确认";
    $signal="active";
  }
echo "<tr class=".$signal.">
      <td>".$row['Address']."</td>
      <td>￥".$row['Price']."</td>
      <td>￥".$row['Fare']."</td>
      <td>".$row['Date']."</td>
      <td>".$row['ownerTel']."</td>
      <td>".$row['hostName']."</td>
      <td>".$ver."</td>
      <td><form method='post'><input value=".$row['ID']." name='id' style='display:none;'/><button type='submit'>取消</button></form></td>
  </tr>";
  $row = mysqli_fetch_assoc($result);
}
?>
    
</body>
    </div>
</html>