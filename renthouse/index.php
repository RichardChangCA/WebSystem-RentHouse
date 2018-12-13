<!DOCTYPE html>
<?php session_start();
unset($_SESSION['account']);?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-ico" href="img/libo.ico"/>
    <title>房屋租赁管理系统</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap/css/style.css">
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!--   <script src="js/index.js"></script>-->
 <script type="text/javascript">
   function verifyFunction(){
    if(document.getElementById('tel').value==""){
      alert("账号不能为空");
    }
    else if(document.getElementById('password').value=="")alert("密码不能为空");
    else if(!(document.getElementById('optionsRadios1').checked||document.getElementById('optionsRadios2').checked||document.getElementById('optionsRadios3').checked))
      alert("类型不能为空");
   }
 </script>
</head>
<body id="index">
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
$tel=$password=$type='';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $tel=$_POST["tel"];
  if ($tel=="") {
    goto end;
  }
  $password=$_POST["password"];
  if ($password=="") {
    goto end;
  }
  $type=$_POST["optionsRadiosinline"];
  if($type=="host"){
    $sql="select Tel from host where Tel='$tel'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==0){echo "<script type='text/javascript'>alert('账号错误');</script>";}
    else 
    {
      $sql="select password from host where Tel='$tel'";
      $result=mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      if($row["password"]!=$password){echo "<script type='text/javascript'>alert('密码错误');</script>";}
      else {
        $_SESSION['account']=$tel;
        header("Location:host.php");
      }
    }
  }
  else if($type=="tenant"){
	$sql="select Tel from tenant where Tel='$tel'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==0){echo "<script type='text/javascript'>alert('账号错误');</script>";}
    else 
    {
      $sql="select Password from tenant where Tel='$tel'";
      $result=mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      if($row["Password"]!=$password){echo "<script type='text/javascript'>alert('密码错误');</script>";}
      else {
        $_SESSION['account']=$tel;
        header("Location:tenant.php");
      }
    }
  }
  else if($type=="admin"){
  	$sql="select Account from admin where Account='$tel'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==0){echo "<script type='text/javascript'>alert('账号错误');</script>";}
    else 
    {
      $sql="select Password from admin where Account='$tel'";
      $result=mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      if($row["Password"]!=$password){echo "<script type='text/javascript'>alert('密码错误');</script>";}
      else header("Location:admin.php");
    }
  }
  end:;
  //else echo "Wrong type";
}
?>
    <div style="padding: 50px 100px 10px;" >
       <div class="page-header">
    <h1>房 屋 租 赁 管 理 系 统
    </h1>
      </div>
    <form class="bs-example bs-example-form" role="form" method="post" id="form" name="form">
        <div  class="input-group">
            <span class="input-group-addon">手机</span>
            <input name="tel" id="tel" type="text" class="form-control" placeholder="Telephone"
                   onkeyup="this.value=this.value.replace(/\D/g,'')"
                   onafterpaste="this.value=this.value.replace(/\D/g,'')"
                   oninput="if(value.length>15)value=value.slice(0,15)">
                                            <!--限制输入唯有数字  15位数-->
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon">密码</span>
            <input name="password" id="password" type="password" class="form-control" placeholder="Password"
                   oninput="if(value.length>15)value=value.slice(0,15)">
        </div>
        <br>
        <div>
    <label class="radio-inline" >
        <input type="radio" name="optionsRadiosinline" id="optionsRadios1" value="host"> 房东
    </label>
    <label class="radio-inline" >
        <input type="radio" name="optionsRadiosinline" id="optionsRadios2"  value="tenant"> 租客
    </label>
    <!-- <label class="radio-inline" >
        <input type="radio" name="optionsRadiosinline" id="optionsRadios3"  value="admin" disabled=""> 管理员
    </label> -->
    <label class="radio-inline" style="display: none;">
        <input type="radio" name="optionsRadiosinline" id="optionsRadios4" value="NULL" checked=""> default
    </label>
</div>


        <div class="btn-group btn-group-lg">
            <button type="submit" class="btn btn-default" id="login" style="margin-top: 45px;" onclick="verifyFunction()">登录</button>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle btn-lg" data-toggle="dropdown" id="registe" aria-expanded="false"
                        style="margin-top: 45px;">注册
                    <span class="caret"></span>
                </button>


    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="registeHost.php">房东注册</a>
        </li>
        <li>
            <a href="registeTenant.php">租客注册</a>
        </li>
    </ul>
</div>
</div>
    </form>
</div>
</body>
</html>