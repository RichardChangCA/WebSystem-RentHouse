<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-ico" href="img/libo.ico"/>
    <title>房东页面</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap/css/style.css">
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    li{
      background-color: pink;
    }
    a{
      color: grey;
      font-weight: bold; 
    }
  </style>
  <script type="text/javascript">
    function fun1(){
      $('#li1').addClass('active');
      $('#li2').removeClass('active');
      $('#li3').removeClass('active');
      $('#li4').removeClass('active');
      $('#li5').removeClass('active');
      $('#li6').removeClass('active');
    }
    function fun2(){
      $('#li1').removeClass('active');
      $('#li2').addClass('active');
      $('#li3').removeClass('active');
      $('#li4').removeClass('active');
      $('#li5').removeClass('active');
      $('#li6').removeClass('active');
    }
    function fun3(){
      $('#li1').removeClass('active');
      $('#li2').removeClass('active');
      $('#li3').addClass('active');
      $('#li4').removeClass('active');
      $('#li5').removeClass('active');
      $('#li6').removeClass('active');
    }
    function fun4(){
      $('#li1').removeClass('active');
      $('#li2').removeClass('active');
      $('#li3').removeClass('active');
      $('#li4').addClass('active');
      $('#li5').removeClass('active');
      $('#li6').removeClass('active');
    }
    function fun5(){
      $('#li1').removeClass('active');
      $('#li2').removeClass('active');
      $('#li3').removeClass('active');
      $('#li4').removeClass('active');
      $('#li5').addClass('active');
      $('#li6').removeClass('active');
    }
    function fun6(){
      $('#li1').removeClass('active');
      $('#li2').removeClass('active');
      $('#li3').removeClass('active');
      $('#li4').removeClass('active');
      $('#li5').removeClass('active');
      $('#li6').addClass('active');
    }
  </script>
</head>

<body id="tenantMainPage">
    <div class="container">
   <div class="row">
      <div class="col-md-4">
        <div class="page-header">
        <h1>房东信息管理</h1>
    </div>
           <ul class="nav nav-pills nav-stacked">
    <li class="active" onclick="fun1()" id="li1"><a href="showHouse.php" target="myFrame">房屋列表</a></li>
    <li onclick="fun2()" id="li2"><a href="addHouse.php" target="myFrame">添加房屋</a></li>
    <li onclick="fun3()" id="li3"><a href="hostsTenantInfo.php" target="myFrame">租客信息</a></li>
    <li onclick="fun4()" id="li4"><a href="hostCheckInfo.php" target="myFrame">预约信息</a></li>
    <li onclick="fun5()" id="li5"><a href="hostContractInfo.php" target="myFrame">合同信息</a></li>
    <li onclick="fun6()" id="li6"><a href="hostInfo.php" target="myFrame">个人信息</a></li>
    <li><a href="index.php">退出登录</a></li>
</ul>
      </div>
      <div class="col-md-8">
            <iframe name="myFrame" src="showHouse.php" height="500px" width="100%"></iframe>
      </div><!--上面的height="500px"变得灵活一点最好，最好能和手机大小兼容那种-->
   </div>
   </div>
    
</body>
</html>