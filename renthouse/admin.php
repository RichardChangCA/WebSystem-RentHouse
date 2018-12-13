<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-ico" href="img/libo.ico"/>
    <title>管理员页面</title>
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
</head>

<body id="tenantMainPage">
    <div class="container">
   <div class="row">
      <div class="col-md-4">
        <div class="page-header">
        <h1>管理员管理</h1>
    </div>
           <ul class="nav nav-pills nav-stacked">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        房东管理<b class="caret"></b>
      </a>
      <ul class="dropdown-menu">
        <li><a href="#">删除房主信息</a></li>
        <li class="divider"></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        租客管理<b class="caret"></b>
      </a>
      <ul class="dropdown-menu">
        <li><a href="#">删除租客信息</a></li>
        <li class="divider"></li>
      </ul>
    </li>


    <li><a href="index.php">退出登录</a></li>
</ul>
      </div>
      <div class="col-md-8">
            <iframe name="myFrame" src="#" height="500px" width="100%"></iframe>
      </div><!--上面的height="500px"变得灵活一点最好，最好能和手机大小兼容那种-->
   </div>
   </div>
    
</body>
</html>