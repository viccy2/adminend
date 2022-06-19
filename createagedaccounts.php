<?php
include "../adminend/header.php";


  // creating form
if(isset($_POST['createaccount']))
{

	$username=$_POST['username'];
	$upassword=$_POST['upassword'];
	$umail=$_POST['umail'];
	$mailpass=$_POST['mailpass'];
	$accyear=$_POST['accyear'];
	$price=$_POST['price'];
	$accid=$_POST['accid'];
	$accNum=$_POST['accNum'];
	$recovmail=$_POST['recovmail'];
	$socialid=$_POST['socialid'];
	$shortdesc=$_POST['shortdesc'];
	$describtion=$_POST['describtion'];

  $msg=mysqli_query($con,"insert into socialaccounts(username,upassword,umail,mailpass,accyear,price,accid,accNum,recovmail,socialid,shortdesc,describtion)values('$username','$upassword','$umail','$mailpass','$accyear','$price','$accid','$accNum','$recovmail','$socialid','$shortdesc','$describtion')");

if($msg)
{
  $_SESSION['msg'] = '';
  $_SESSION['color'] = '';
  $extra="createagedaccounts.php";
  $_SESSION['msg'] = "Account Successfully Created";
  $_SESSION['color'] = "success";
  $host=$_SERVER['HTTP_HOST'];
  $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
  header("location:http://$host$uri/$extra");

}else{

  $extra="createagedaccounts.php";
  $_SESSION['msg'] = "Something went wrong,please try again";
  $_SESSION['color'] = "danger";
  $host=$_SERVER['HTTP_HOST'];
  $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
  header("location:http://$host$uri/$extra");

}


}

if(isset($_GET['fun'])){

  if(isset($_GET['id'])){
    $fid = $_GET['id'];
		$msg=mysqli_query($con,"delete from socialaccounts where id='$fid'");
		if($msg)
		{
		   $extra="createagedaccounts.php";
		  $_SESSION['msg'] = "Form Successfully deleted";
		  $_SESSION['color'] = "success";
		  $host=$_SERVER['HTTP_HOST'];
		  $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		  header("location:http://$host$uri/$extra");
		}else{
			$extra="createagedaccounts.php";
			$_SESSION['msg'] = "Something went wrong,please try again";
			$_SESSION['color'] = "danger";
			$host=$_SERVER['HTTP_HOST'];
			$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
			header("location:http://$host$uri/$extra");
		}


  }

}

function get_social($sid){
	 include 'dbconnection.php';
	   $rs=mysqli_query($con,"SELECT * FROM socials WHERE id = $sid");
	  $rtn=mysqli_fetch_array($rs);
		return $rtn;
}

 ?>





<section class="add-funds m-t-30">   
  <div class="container-fluid">
 
    
    <div class="row justify-content-md-center" id="result_ajaxSearch">
      <div class="col-md-8">
          
           <?php if(isset($_SESSION['msg']) && ($_SESSION['msg'] !== '' )) { ?>
   <div class="alert alert-<?= $_SESSION['color'] ?> alert-dismissible fade show" role="alert">
  <?= $_SESSION['msg'] ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php $_SESSION['msg'] = ''; $_SESSION['color'] = ''; } ?>
          
                   <div class="card">
              <div class="card-header" style=';color:black'>
               <b> Create Social Account </b>
              </div>
              <div class="card-body">
                   			
                   			
            <form name="" method="post" action="" enctype="multipart/form-data" style=';color:black'>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username</label>
      <input type="text" name="username" class="form-control" id="inputEmail4" placeholder="username">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="text" name="upassword" class="form-control" id="inputPassword4" placeholder="password">
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="umail" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email Password</label>
      <input type="text" name="mailpass" class="form-control" id="inputPassword4" placeholder="email password">
    </div>
  </div>
  
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Years</label>
      <input type="text" name="accyear" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Price</label>
      <input type="text" name="price" class="form-control" id="inputZip">
    </div>
  </div>
  
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Account ID</label>
      <input type="text" name="accid" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Account Phone Number</label>
      <input type="text" name="accNum" class="form-control" id="inputZip">
    </div>
  </div>
  
   <div class="form-group">
    <label for="inputAddress">Acount recovery mail</label>
    <input type="text" name="recovmail" class="form-control" id="inputAddress" placeholder="Short Description">
  </div>

  
   <div class="form-group">
      <label for="inputState">Social Account</label>
      <select name="socialid" id="inputState" class="form-control">
        <option selected>Choose...</option>
           <?php  $scs=mysqli_query($con,"select * from socials");
    while($social=mysqli_fetch_array($scs))
    {?>
         <option value="<?= $social['id'] ?>"> <?= $social['name'] ?></option>
      <?php } ?> 
      </select>
  </div>
  
   <div class="form-group">
    <label for="inputAddress">Short Describtion</label>
    <input type="text" name="shortdesc" class="form-control" id="inputAddress" placeholder="Short Description">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Description</label>
    <input type="text" name="describtion" class="form-control" id="inputAddress2" placeholder="Description">
  </div>
 
  <input type="submit" class="btn btn-primary float-right" name="createaccount"  value="Create" >
</form>
                
              </div>
            </div>
      </div>
      

    </div>
    <div class="row" id="">
      <div class="col-md-1">
      </div>
      
      <div class="col-md-10 table-responsive">
           <table class="table table-bordered" >
  <thead>
    <tr style="background-color:#000;color:#fff">
      <th scope="col">#</th>
      <th scope="col">Social Media</th>
      <th scope="col">Username</th>
      <th scope="col">password</th>
      <!--<th scope="col">email</th>-->
      <!--<th scope="col">email password</th>-->
      <th scope="col">Details</th>
    <!--  <th scope="col">years</th>-->
    <!-- <th scope="col">price</th>-->
    <!--<th scope="col">Account ID</th>-->
    <!-- <th scope="col">Account Recovery Number</th>-->
    <!-- <th scope="col">Recovery Mail</th>-->
    <!-- <th scope="col">short description</th>-->
    <!-- <th scope="col">description</th>-->
    <!--<th scope="col">bought</th>-->
    <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

   <?php  $ret=mysqli_query($con,"select * from socialaccounts");
    $cnt=1;
    while($socialaccount=mysqli_fetch_array($ret))
    {?>
     <tr style=';color:black'>
      <th scope="row"><?=$cnt ?></th>
      <td> <?= get_social($socialaccount['socialid'])['name'] ?> </td>
      <td><?= $socialaccount['username'] ?></td>
      <td><?= $socialaccount['upassword'] ?></td>
      <!--<td><?= $socialaccount['umail'] ?></td>-->
      <!--<td><?= $socialaccount['mailpass'] ?></td>-->
      <td><a class="text-white" href="accdets.php?id=<?= $socialaccount['id'] ?>"><button class="btn btn-success">View More</button></a></td>
      <!--<td><?= $socialaccount['accyear'] ?></td>      -->
      <!--<td><?= $socialaccount['price'] ?></td>-->
      <!--<td><?= $socialaccount['accid'] ?></td>-->
      <!--<td><?= $socialaccount['accNum'] ?></td>-->
      <!--<td><?= $socialaccount['recovmail'] ?></td>-->
      <!--<td><?= $socialaccount['shortdesc'] ?></td> -->
      <!--<td><?= $socialaccount['describtion'] ?></td>-->
      <!--<td><?= $socialaccount['is_buy']==1?'YES':'NO' ?></td>-->
      <td><a href="createagedaccounts.php?fun=del&id=<?php echo $socialaccount['id'];?>"><i class="fa fa-trash text-danger"></i> </a></td>
    </tr>
      <?php $cnt=$cnt+1; }?>
  </tbody>
</table>
      </div>
      
        <div class="col-md-1">
      </div>
      
    </div>
  </div>
</section>


<style>
  .page-title h1{
    margin-bottom: 5px; }
    .page-title .border-line {
      height: 5px;
      width: 270px;
      background: #eca28d;
      background: -webkit-linear-gradient(45deg, #eca28d, #f98c6b) !important;
      background: -moz- oldlinear-gradient(45deg, #eca28d, #f98c6b) !important;
      background: -o-linear-gradient(45deg, #eca28d, #f98c6b) !important;
      background: linear-gradient(45deg, #eca28d, #f98c6b) !important;
      position: relative;
      border-radius: 30px; }
    .page-title .border-line::before {
      content: '';
      position: absolute;
      left: 0;
      top: -2.7px;
      height: 10px;
      width: 10px;
      border-radius: 50%;
      background: #fa6d7e;
      -webkit-animation-duration: 6s;
      animation-duration: 6s;
      -webkit-animation-timing-function: linear;
      animation-timing-function: linear;
      -webkit-animation-iteration-count: infinite;
      animation-iteration-count: infinite;
      -webkit-animation-name: moveIcon;
      animation-name: moveIcon; }

  @-webkit-keyframes moveIcon {
    from {
      -webkit-transform: translateX(0);
    }
    to { 
      -webkit-transform: translateX(215px);
    }
  }
</style>





<?php
include "../adminend/footer.php";
 ?>
