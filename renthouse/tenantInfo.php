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
    $(document).ready(function(){
        $("#btn1").show();
        $("#btn2").hide();
    });
        
function changeFunction(){
    $("#btn2").show();
    $("#btn1").hide();
    document.getElementById('name').removeAttribute("disabled");
    document.getElementById('id').removeAttribute("disabled");
    document.getElementById('age').removeAttribute("disabled");
    document.getElementById('code').removeAttribute("disabled");
    document.getElementById('optionsRadios1').removeAttribute("disabled");
    document.getElementById('optionsRadios2').removeAttribute("disabled");
}
</script>
</head>
<div style="margin-top: 8%;margin-left: 32%; width: 400px;height: 600px; text-align:center;">
<body style="background-image: url('img/3.jpg');">
<?php
$tenantTel=$_SESSION['account'];
$show="disabled";
$dbhost = 'localhost:3306';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = '';          // mysql用户名密码
$dbname = 'renthouse';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
if(! $conn )
{
    die('Could not connect: ' . mysqli_error());
}
$sql="select * from tenant where Tel='$tenantTel';";
mysqli_query($conn,'set names utf8');
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$name=$row["Name"];
$ID=$row["ID"];
$Age=$row["Age"];
$password=$row["Password"];
$Gender=$row["Gender"];
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
 $name=$_POST["name"];
 $ID=$_POST["id"];
 $Age=$_POST["age"];
 $password=$_POST["code"];
 $Gender=$_POST["optionsRadiosinline"];
 $sql="update tenant set Name='$name',ID='$ID',Age='$Age',Password='$password',Gender='$Gender' where Tel='$tenantTel';";
 mysqli_query($conn,'set names utf8');
 if(mysqli_query($conn,$sql)==TRUE){
     echo '<script type="text/javascript">alert("修改成功")</script>';
 }
 }
?>
<form class="form-horizontal" role="form" method="post">
    <div class="form-group">
        <label for="tel" class="col-sm-2 control-label">电话</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="tel" 
                   disabled="disabled" value='<?php echo $tenantTel;?>'>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name"
                   disabled="disabled" value="<?php echo $name;?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="id" class="col-sm-2 control-label">身份证号</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="id" name="id"
                   disabled="disabled" value="<?php echo $ID;?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="age" class="col-sm-2 control-label">年龄</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="age" name="age"
                   disabled="" value="<?php echo $Age;?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="code" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="code" name="code"
                   disabled="disabled" value="<?php echo $password;?>" >
        </div>
    </div>
    <div>
    <label class="radio-inline" >
        <input type="radio" name="optionsRadiosinline" id="optionsRadios1" value="male" <?php if($Gender=='male')echo "checked";?> disabled> 男
    </label>
    <label class="radio-inline" >
        <input type="radio" name="optionsRadiosinline" id="optionsRadios2"  value="female" <?php if($Gender=='female')echo "checked";?> disabled> 女
    </label>
</div>
    <div class="form-group">
        <div id="btn1" class="col-sm-offset-2 col-sm-10" style="margin-top: 20px;padding-right: 22px;">
            <button type="button" class="btn btn-default" onclick="changeFunction()" >修改</button>
        </div>
        <div id="btn2" class="col-sm-offset-2 col-sm-10">
            <button  type="submit" class="btn btn-default" >提交</button>
        </div>
    </div>
</form>
</body>
</div>
</html>