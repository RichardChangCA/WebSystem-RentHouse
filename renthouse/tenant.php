<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <link rel="icon" type="image/x-ico" href="img/libo.ico"/>
    <meta charset="UTF-8">
    <title>租客页面</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap/css/style.css">
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function fun1(){
      $('#li1').addClass('active');
      $('#li2').removeClass('active');
      $('#li3').removeClass('active');
      $('#li4').removeClass('active');
      $('#li5').removeClass('active');
    }
    function fun2(){
      $('#li1').removeClass('active');
      $('#li2').addClass('active');
      $('#li3').removeClass('active');
      $('#li4').removeClass('active');
      $('#li5').removeClass('active');
    }
    function fun3(){
      $('#li1').removeClass('active');
      $('#li2').removeClass('active');
      $('#li3').addClass('active');
      $('#li4').removeClass('active');
      $('#li5').removeClass('active');
    }
    function fun4(){
      $('#li1').removeClass('active');
      $('#li2').removeClass('active');
      $('#li3').removeClass('active');
      $('#li4').addClass('active');
      $('#li5').removeClass('active');
    }
function fun5(){
      $('#li1').removeClass('active');
      $('#li2').removeClass('active');
      $('#li3').removeClass('active');
      $('#li4').removeClass('active');
      $('#li5').addClass('active');
    }
  </script>
</head>

<body id="tenantMainPage">
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
$tel=$_SESSION['account'];
$sql="select Name from tenant where Tel='$tel'";
mysqli_query($conn,'set names utf8');
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>    
<nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
<nav class="navbar-header">
    <button class="navbar-toggle" data-toggle="collapse" data-target="#res-nav"><span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span></button>
               <a href="#" class="navbar-brand"><strong>租客信息管理</strong></a>
</nav>
          <div class="collapse navbar-collapse" id="res-nav">
                <ul class="nav navbar-nav">
                   <li class="active" id="li1" onclick="fun1()"><a href="UnrentHoustList.php" target="inset">房屋列表</a></li>
                   <li id="li2" onclick="fun2()"><a href="checkTenantRentedHouse.php" target="inset">已租房屋信息</a></li>
                   <li id="li3" onclick="fun3()"><a href="tenantCheckInfo.php" target="inset">看房预约信息</a></li>
                   <li id="li4" onclick="fun4()"><a href="findPartener.php" target="inset">寻找合租</a></li>
                   <li id="li5" onclick="fun5()"><a href="tenantInfo.php" target="inset">个人信息</a></li>
               </ul>
               <p class="nav navbar-text navbar-right"><button><a href="index.php">退出登录</a></button></p>
                  <p class="nav navbar-text navbar-right">您好，<?php echo $row["Name"]?></p>

                </div>
           </div></div>
        </nav>
        <iframe src="UnrentHoustList.php" width="100%" height="550px" name="inset"></iframe>
        <!--上面的height="550px"变得灵活一点最好，最好能和手机大小兼容那种-->

</body>

</html>