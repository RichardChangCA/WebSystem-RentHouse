<!DOCTYPE html>
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
$hostTel="15900309938";
$sql="select ID,Address,Name,Tel,Age,Gender,StartTime,EndTime from hostsTenant where ownerTel='$hostTel'";
mysqli_query($conn,'set names utf8');
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>    
<table class="table">
  <caption>已租房屋的房客信息</caption>
  <thead>
    <tr><th>房屋ID</th>
      <th>地址</th>
      <th>开始日期</th>
      <th>终止日期</th>
      <th>房客姓名</th>
      <th>房客电话</th>
      <th>房客年龄</th>
      <th>房客性别</th>
    </tr>
  </thead>
  <tbody>
<?php
$i=0;
$n=mysqli_num_rows($result);
for(;$i<$n;$i++){
if($row['Gender']=="male")$sex="男";
else $sex="女";
echo "<tr>
      <td>".$row['ID']."</td>
      <td>".$row['Address']."</td>
      <td>".$row['StartTime']."</td>
      <td>".$row['EndTime']."</td>
      <td>".$row['Name']."</td>
      <td>".$row['Tel']."</td>
      <td>".$row['Age']."</td>
      <td>".$sex."</td>
  </tr>";
  $row = mysqli_fetch_assoc($result);
}
?>
    
    
  </tbody>
</table>
    
</body>
</html>