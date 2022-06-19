<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_POST['login']))
{
  $adminusername=$_POST['username'];
  $pass=($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['admindets']=$num;
$_SESSION['id']=$num['id'];
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
$_SESSION['action1']="*Invalid username or password";
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>THE MIGHTYGAINS || Admin-Login</title>
    <link href="../adminend/assets/css/bootstrap.css" rel="stylesheet">
    <link href="../adminend/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../adminend/assets/css/style.css" rel="stylesheet">
    <link href="../adminend/assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>
	  <div id="login-page" style='margin-top:80px;'>
	  	<div class="container">


		      <form class="form-login" action="" method="post">
		        <h2 class="form-login-heading" style=';background:black'>Admin Login</h2>
                  <p style="color:#F00; padding-top:20px;" align="center">
                    <?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
		        <div class="login-wrap">
		            <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="Password"><br >
		            <input  name="login" class="btn btn-theme btn-block" type="submit" style=';background:black'>

		        </div>
		      </form>

	  	</div>
	  </div>
    <script src="../adminend/assets/js/jquery.js"></script>
    <script src="../adminend/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../adminend/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("adminend/assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
