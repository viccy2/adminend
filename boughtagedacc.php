<?php

include "../adminend/header.php";

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

   <?php  $ret=mysqli_query($con,"select * from socialaccounts WHERE is_buy = 1");
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
      <td><a href="createagedaccounts.php?fun=del&id=<?php echo $row['id'];?>"><i class="fa fa-trash text-danger"></i> </a></td>
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
