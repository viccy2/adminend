<?php
include "../adminend/header.php";

$acc_id = $_GET['id'];
  $rs=mysqli_query($con,"SELECT * FROM socialaccounts WHERE id = $acc_id");
	  $acc=mysqli_fetch_array($rs);


function get_social($sid){
	 include 'dbconnection.php';
	   $rs=mysqli_query($con,"SELECT * FROM socials WHERE id = $sid");
	  $rtn=mysqli_fetch_array($rs);
		return $rtn;
}

 ?>



<section class="add-funds m-t-30">   
  <div class="container-fluid">
    
    <div class="row" id="">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
        
        <div class="card">
          <div class="card-header d-flex justify-content-center" style="background:#000;color:#fff">
        <center>  <?= strtoupper(get_social($acc['socialid'])['name']); ?>  ACCOUNT DETAILS </center>
          </div>
          
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Username: <?= $acc['username'] ?></li>
            <li class="list-group-item">Password: <?= $acc['upassword'] ?></li>
            <li class="list-group-item">Mail: <?= $acc['umail'] ?></li>
            <li class="list-group-item">Password: <?= $acc['mailpass'] ?></li>
            <li class="list-group-item">Short Describtion: <?= $acc['shortdesc'] ?></li>
            <li class="list-group-item">Describtion: <?= $acc['describtion'] ?></li>
            <li class="list-group-item">Account Year: <?= $acc['accyear'] ?></li>
            
           <li class="list-group-item">Account ID: <?= $acc['accid'] ?></li>
            <li class="list-group-item">Account Recovery Number: <?= $acc['accNum'] ?></li>
            <li class="list-group-item">Recovery Mail: <?= $acc['recovmail'] ?></li>
            
            <li class="list-group-item">Price:<s>N</s><?= $acc['price'] ?></li>
            
          </ul>
        </div>
        <!--<center><small class="text-danger">KINDLY NOTE DOWN ACCOUNTT DETIALS BECAUSE IT WON'T BE VISIBLE AGAIN</small></center>-->
    </div>
    <div class="col-md-3">
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
