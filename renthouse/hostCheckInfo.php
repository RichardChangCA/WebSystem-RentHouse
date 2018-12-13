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
  <script type="text/javascript">
  </script>
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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $id=$_POST["id"];
  $which=$_POST["which"];
  if($which==0){
    $sql="delete from `check` where ID='$id';";
    if(mysqli_query($conn,$sql)==TRUE){
      echo "<script type='text/javascript'>alert('取消成功');//location.reload();</script>";
    }
  }
  if($which==1){
 
    $sql="update `check` SET verify=1 where ID='$id';";
    if(mysqli_query($conn,$sql)==TRUE){
      echo "<script type='text/javascript'>alert('已确认');//location.reload();</script>";
    }
  }
}
    

$hostTel=$_SESSION['account'];
$sql="select verify,ID,Address,Price,Tel,tenantName,Date from checkView where ownerTel='$hostTel'";
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
      <th>看房日期</th>
      <th>房客电话</th>
      <th>房东姓名</th>
      <th>确认信息</th>
      <th>取消看房预约</th>
    </tr>
  </thead>
  <tbody>

<?php
$i=0;
$n=mysqli_num_rows($result);
for(;$i<$n;$i++){
  if($row['verify']=='0'){
    $ver="<form method='post'><input value=".$row['ID']." name='id' style='display:none;'/><input value='1' name='which' style='display:none;'/><button type='submit'>确认</button></form>";
    $signal="danger";
  }
  else{
    $ver="已确认";
    $signal="active";
  }
echo "<tr class=".$signal.">
      <td>".$row['Address']."</td>
      <td>￥".$row['Price']."</td>
      <td>".$row['Date']."</td>
      <td>".$row['Tel']."</td>
      <td>".$row['tenantName']."</td>
      <td>".$ver."</td>
      <td><form method='post'><input value=".$row['ID']." name='id' style='display:none;'/><input value='0' name='which' style='display:none;'/><button type='submit'>取消</button></form></td>
  </tr>";
  $row = mysqli_fetch_assoc($result);
}
?>
    
</body>
</html>