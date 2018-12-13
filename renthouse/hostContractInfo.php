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
    $sqlZero="select houseID from `contract` where ID='$id';";
    $result=mysqli_query($conn,$sqlZero);
    $row = mysqli_fetch_assoc($result);
    $houseID=$row["houseID"];
    $sql="delete from `contract` where ID='$id';";
    if(mysqli_query($conn,$sql)==TRUE){
      echo "<script type='text/javascript'>alert('删除成功');</script>";
    }
    
    $sqlThree="select * from `contract` where houseID='$houseID';";
    $result=mysqli_query($conn,$sqlThree);
    if(mysqli_num_rows($result)==0){
        $sqlTwo="update `house` SET status=0 where ID = '$houseID'";
        mysqli_query($conn,$sqlTwo);
    }
  }
  if($which==1){
 
    $sql="update `contract` SET varify=1 where ID='$id';";
    $sqlTwo="update `house` SET status=1 where ID = (select houseID from `contract` where ID='$id');";
    if(mysqli_query($conn,$sql)==TRUE&&mysqli_query($conn,$sqlTwo)==TRUE){
      echo "<script type='text/javascript'>alert('已签订');</script>";
    }
  }
}
    

$hostTel=$_SESSION['account'];
$sql="select varify,status,Address,Price,TenantTel,Name,StartTime,EndTime,Age,ID from `confirmContract` where ownerTel='$hostTel'";
mysqli_query($conn,'set names utf8');
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>    
<table class="table">
  <caption>合同已签订待签订一览表</caption>
  <thead>
    <tr>
      <th>地址</th>
      <th>价格</th>
      <th>起始日期</th>
      <th>终止日期</th>
      <th>房客电话</th>
      <th>房客姓名</th>
      <th>房客年龄</th>
      <th>签订合同</th>
      <th>删除无效合同</th>
    </tr>
  </thead>
  <tbody>

<?php
$i=0;
$n=mysqli_num_rows($result);
for(;$i<$n;$i++){
  if($row['varify']=='0'){
    $ver="<form method='post'><input value=".$row['ID']." name='id' style='display:none;'/><input value='1' name='which' style='display:none;'/><button type='submit'>签订</button></form>";
    $signal="danger";
  }
  else{
    $ver="已签订";
    $signal="active";
  }
echo "<tr class=".$signal.">
      <td>".$row['Address']."</td>
      <td>￥".$row['Price']."</td>
      <td>".$row['StartTime']."</td>
      <td>".$row['EndTime']."</td>
      <td>".$row['TenantTel']."</td>
      <td>".$row['Name']."</td>
      <td>".$row['Age']."</td>
      <td>".$ver."</td>
      <td><form method='post'><input value=".$row['ID']." name='id' style='display:none;'/><input value='0' name='which' style='display:none;'/><button type='submit'>删除</button></form></td>
  </tr>";
  $row = mysqli_fetch_assoc($result);
}
?>
    
</body>
</html>