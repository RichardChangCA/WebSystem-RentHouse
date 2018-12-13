<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <meta  http-equiv="Content-Type" content="text/html charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="wnameth=device-wnameth, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap/css/style.css">
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div style="width: 400px;height: 600px;text-align: center;margin-top: 3%;margin-left: 20%;">
<body style="background-image: url('img/3.jpg');">
<?php
header("Content-Type: text/html; charset=UTF-8");
$hostTel=$_SESSION['account'];
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
$pattern=$address=$price=$size=$feature='';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $pattern=$_POST["inputPattern"];
    $address=$_POST["inputAddress"];
    $price=$_POST["inputPrice"];
    $size=$_POST["inputSize"];
    $feature=$_POST["inputFeature"];
    $sql="insert into house(Pattern,Address,Price,Size,Features,ownerTel) values('$pattern','$address','$price','$size','$feature','$hostTel')";
    mysqli_query($conn,"set names 'utf8'");//防止乱码
    if(mysqli_query($conn,$sql)==TRUE){
        echo "<script type='text/javascript'>alert('插入成功')</script>";
    }
    else echo "<script type='text/javascript'>alert('插入失败')</script>";
}
?>
    <form class="form-horizontal" role="form" method="post">
  <div class="form-group">
    <label class="col-sm-2 control-label">房主</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo $hostTel;?></p>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPattern" class="col-sm-2 control-label">房型</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputPattern" placeholder="请输入房型">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddr" class="col-sm-2 control-label">地址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputAddress" placeholder="请输入地址">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPrice" class="col-sm-2 control-label">价格￥</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputPrice" placeholder="请输入价格">
    </div>
  </div>
  <div class="form-group">
    <label for="inputSize" class="col-sm-2 control-label">面积m²</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputSize" placeholder="请输入面积">
    </div>
  </div>
  <div class="form-group">
    <label for="inputFeatures" class="col-sm-2 control-label">特点</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputFeature" placeholder="请输入特点">
    </div>
  </div>

  <div class="btn-group btn-group-lg">
    <button type="submit" class="btn btn-default" name="login">提交</button>
   <button type="reset" class="btn btn-default" name="reset">重置</button>
</div>
</form>
</body>
</div>
</html>