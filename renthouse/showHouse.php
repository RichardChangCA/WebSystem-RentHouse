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
$ID=$Pattern=$Address=$Price=$Size=$Features=$status='';
$owner=$_SESSION['account'];
$sql="select ID,Pattern,Address,Price,Size,Features,status from house where ownerTel='$owner'";
mysqli_query($conn,'set names utf8');
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>    
<table class="table">
  <caption>房屋信息</caption>
  <thead>
    <tr>
      <th>编号</th>
      <th>房型</th>
      <th>地址</th>
      <th>价格</th>
      <th>大小</th>
      <th>特点</th>
      <th>状态</th>
    </tr>
  </thead>
  <tbody>
<?php
$i=0;
$n=mysqli_num_rows($result);
for(;$i<$n;$i++){
    if($row['status']==0){
        $signal="danger";
        $sta="未租赁";
    }
    else {
        $signal="active";
        $sta="已租赁";
    }
echo "<tr class='".$signal."'>
      <td>".$row['ID']."</td>
      <td>".$row['Pattern']."</td>
      <td>".$row['Address']."</td>
      <td>￥".$row['Price']."/年</td>
      <td>".$row['Size']."m²</td>
      <td>".$row['Features']."</td>
      <td>".$sta."</td>
  </tr>";
  $row = mysqli_fetch_assoc($result);
}
?>
    
    
  </tbody>
</table>
    
</body>
</html>