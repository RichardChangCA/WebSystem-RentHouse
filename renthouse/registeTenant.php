<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>租客注册</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap/css/style.css">
    <script src="lib/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>

</head>
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
$name=$password=$phoneNumber=$idCode=$optionsRadios=$age='';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $phoneNumber=$_POST["phoneNumber"];
    if($phoneNumber==""){
        echo "<script type='text/javascript'>alert('电话不能为空')</script>";
        goto end;
    }
    $name=$_POST["name"];
    if($name==""){
        echo "<script type='text/javascript'>alert('姓名不能为空')</script>";
        goto end;
    }
    $idCode=$_POST["idCode"];
    if($idCode==""){
        echo "<script type='text/javascript'>alert('身份证号不能为空')</script>";
        goto end;
    }
    $age=$_POST["age"];
    if($age==""){
        echo "<script type='text/javascript'>alert('年龄不能为空')</script>";
        goto end;
    }
    $password=$_POST["password"];
    if($password==""){
        echo "<script type='text/javascript'>alert('密码不能为空')</script>";
        goto end;
    }
    $optionsRadios=$_POST["optionsRadios"];
    if($optionsRadios=="NULL"){
        echo "<script type='text/javascript'>alert('性别不能为空')</script>";
        goto end;
    }
    $sql="select * from tenant where Tel='$phoneNumber';";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)!=0){
        echo "<script type='text/javascript'>alert('账号已存在');</script>";
        goto end;
    }else {
        $sql="insert into tenant values('$phoneNumber','$name','$idCode','$age','$password','$optionsRadios');";
        mysqli_query($conn,'set names utf8');
        if(mysqli_query($conn,$sql)==TRUE){
            echo "<script>alert('注册成功');location.href='index.php';</script>";
        }
    }

}
end:;
?>
<body id="tenantRe">
<div class="hostRe-header">
    <h1>租 客  注 册
</div>
<div class="tenantMainForm" style="background-image: url('img/3.jpg');">

    <form class="form-horizontal" role="form" method="post">
    <div class="form-group">
        <label for="phoneNumber" class="col-sm-2 control-label">电话</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="请输入电话" onkeyup="this.value=this.value.replace(/\D/g,'')" 
                   onafterpaste="this.value=this.value.replace(/\D/g,'')" 
                   oninput="if(value.length>15)value=value.slice(0,15)">
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="请输入姓名"
                   oninput="if(value.length>30)value=value.slice(0,30)">
        </div>
    </div>
    <div class="form-group">
        <label for="idCode" class="col-sm-2 control-label">身份证号</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="idCode" name="idCode" placeholder="请输入身份证号"
                   oninput="if(value.length>20)value=value.slice(0,20)">
        </div>
    </div>
    <div class="form-group">
        <label for="age" class="col-sm-2 control-label">年龄</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="age" name="age" placeholder="请输入年龄" onkeyup="this.value=this.value.replace(/\D/g,'')" 
                   onafterpaste="this.value=this.value.replace(/\D/g,'')" oninput="if(value.length>3)value=value.slice(0,3)">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="password" name="password" placeholder="请输入密码"
                   oninput="if(value.length>15)value=value.slice(0,15)">
        </div>
        <!--<div class="form-group">-->
            <!--<label for="repassword" class="col-sm-2 control-label">再次输入密码</label>-->
            <!--<div class="col-sm-10">-->
                <!--<input type="text" class="form-control" id="repassword" placeholder="请再次输入"-->
                       <!--oninput="if(value.length>15)value=value.slice(0,15)">-->
            <!--</div>-->
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">性别</label>
        <div class="col-sm-10">
            <label>
                <input type="radio" name="optionsRadios" id="genderM" value="male"> 男
                <input type="radio" name="optionsRadios" id="genderF" value="female">女
                <input type="radio" name="optionsRadios" id="default" value="NULL" style="display: none;" checked="">
            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">注册</button>
            <button type="reset" class="btn btn-default">重置</button>
            <button type="button" class="btn btn-default"> <a href="index.php">返回主页</a></button>   
        </div>
    </div>
</div>
</form>
</body>
</html>