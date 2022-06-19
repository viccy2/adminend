<?php
include "../adminend/header.php";
 ?>


 <div class="row" style='margin-top:100px'>

   <div class="col-md-3">
 </div>
   <div class="col-md-6">

     <!-- Profile Image -->
     <div class="card card-primary card-outline" style=';color:black'>
       <div class="card-body box-profile">

         <h3 class="profile-username text-center">Admin Profile</h3>

         <ul class="list-group list-group-unbordered mb-3">
           <li class="list-group-item" style=';color:black'>
             <b>Username</b> <a class="float-right">  <?= $admindets['username']?$admindets['username']:'NULL'  ?> </a>
           </li>
           <li class="list-group-item" style=';color:black'>
             <b>Name</b> <a class="float-right"> <?= $admindets['name'] !== null?$admindets['name']:'NULL'  ?> </a>
           </li>
         </ul>

       </div>
       <!-- /.card-body -->
     </div>
     <!-- /.card -->


   </div>
   <div class="col-md-3">
 </div>
 </div>

<?php
include "../adminend/footer.php";
 ?>
