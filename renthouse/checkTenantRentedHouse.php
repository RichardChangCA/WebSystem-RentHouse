<!DOCTYPE html>
<?php session_start(); error_reporting(0);?>
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
<?php
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
$StartTime=$EndTime=$Address=$Fare=$Price=$ownerTel='';
$tenantTel=$_SESSION['account'];
$sql="select Address,StartTime,EndTime,Fare,Price,ownerTel from houseRented where tenantTel='$tenantTel'";
mysqli_query($conn,'set names utf8');
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>    
<table class="table">
  <caption>已租房屋信息</caption>
  <thead>
    <tr>
      <th>地址</th>
      <th>开始日期</th>
      <th>终止日期</th>
      <th>价格</th>
      <th>交易费</th>
      <th>房东电话</th>
    </tr>
  </thead>
  <tbody>
<?php
$i=0;
$n=mysqli_num_rows($result);
for(;$i<$n;$i++){
echo "<tr>
      <td>".$row['Address']."</td>
      <td>".$row['StartTime']."</td>
      <td>".$row['EndTime']."</td>
      <td>￥".$row['Price']."/年</td>
      <td>￥".$row['Fare']."</td>
      <td>".$row['ownerTel']."</td>
  </tr>";
  $row = mysqli_fetch_assoc($result);
}
?>
    
    
  </tbody>
</table>
    
</body>
    </div>
</html>