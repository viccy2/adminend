<?php
include "../adminend/header.php";

if(isset($_GET['id']))
{

$fun = $_GET['fun'];
$userid = $_GET['id'];

if($fun == "del"){

$msg=mysqli_query($con,"delete from users where id='$userid'");
if($msg)
{
echo "<script>alert('Account deleted');</script>";
}

}else if($fun == "lock"){

  $status = "yes";
$msg=mysqli_query($con,"update users set is_lock='$status' where id='$userid'");

if($msg)
{
echo "<script>alert('Account locked');</script>";
}else{
    echo "<script>alert('Something went wrong,please try again');</script>";
}

}else if($fun == "unlock"){

  $status = "no";
$msg=mysqli_query($con,"update users set is_lock='$status' where id='$userid'");
if($msg)
{
echo "<script>alert('Account unlockedtt');</script>";
}else{
    echo "<script>alert('Something went wrong,please try again');</script>";
}

}else if($fun == "isfit"){

  $status = "no";
$msg=mysqli_query($con,"update users set is_fit='$status' where id='$userid'");
if($msg)
{
echo "<script>alert('Fitness Status Changed');</script>";
}else{
    echo "<script>alert('Something went wrong,please try again');</script>";
}

}else if($fun == "fit"){

  $status = "yes";
$msg=mysqli_query($con,"update users set is_fit='$status' where id='$userid'");
if($msg)
{
echo "<script>alert('Fitness Status Changed');</script>";
}else{
    echo "<script>alert('Something went wrong,please try again');</script>";
}

}else{
  echo "<script>alert('Unkown Command');</script>";
}

}

 ?>
            <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Users DataTable </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="korepedatatable" class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                  
                        <tr>
                         <th>First Name</th>
                         <th>Middle Name</th>
                         <th>Surname</th>
                         <th>Phone Number</th>
                         <th>Email</th>
                         <th>Stage</th>
                         <th>State Of Residence</th>
                         <th>Residence Address</th>
                         <th>Utility Bill</th>                   
                         <th>Recent Passport/Photograph</th>
                         <th>Married?</th>
                         <th>Spouse Name</th>
                         <th>Spouse Number</th>
                         <th>Next of kin Name</th>
                         <th>Name of kin Number</th>
                         <th>Valid Id Card</th>
                         <th>Rented Apartment?</th>
                         <th>Landlord Name</th>
                         <th>Landlord Number</th>
                         <th>House Document</th>
                         <th>House Owner Name</th>
                         <th>House Owner Number</th>
                         <th>Medical Certificate</th>
                         <th>Medically Fit?</th>
                         <th>Account Status</th>
                          <th> Action </th>

                       </tr>
               
                      </thead>
                      <tbody>
                      <?php $ret=mysqli_query($con,"select * from users");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                      <tr>

                <td> <?= $row['fName'] ?></td>
                <td> <?= $row['mName'] ?></td>
                <td> <?= $row['surname'] ?></td>
                <td> <?= $row['phoneNumb'] ?></td>
                <td> <?= $row['email'] ?></td>
                <td> <?= $row['stage'] !== null?$row['stage']:1 ?></td>
                <td> <?= $row['s_of_res'] ?></td>
                <td> <?= $row['res_add'] ?></td>
               
                <td>
                  <?php if($row['util_bill'] !== null){ ?>
                   <img src="../userend/dashboard/uploads/<?= $row['util_bill'] ?>" width="50px" height="50px" alt="">

                <?php }else{  ?>
                       NULL
                  <?php } ?>
                  </td>  

                  <td>
                  <?php if($row['recent_photo'] !== null){ ?>
                   <img src="../userend/dashboard/uploads/<?= $row['recent_photo'] ?>" width="50px" height="50px" alt="">

                <?php }else{  ?>
                       NULL
                  <?php } ?>
                  </td>

                <td> <?= $row['is_married'] ?></td>
                <td> <?= $row['spouse_name'] !== null?$row['spouse_name']:'NULL' ?></td>
                <td> <?= $row['spouse_poneNumber'] !== null?$row['spouse_poneNumber']:'NULL' ?></td>
                <td> <?= $row['nok_name'] !== null?$row['nok_name']:'NULL'  ?></td>
                <td> <?= $row['nok_phoneNumber'] !== null?$row['nok_phoneNumber']:'NULL' ?></td>
                
                <td>
                  <?php if($row['valid_idCard'] !== null){ ?>
                   <img src="../userend/dashboard/uploads/<?= $row['valid_idCard'] ?>" width="50px" height="50px" alt="">

                <?php }else{  ?>
                       NULL
                  <?php } ?>
                  </td>
                
                <td> <?= $row['is_rent']?$row['is_rent']:'NULL' ?></td>
                <td> <?= $row['landlord_name'] !== null?$row['landlord_name']:'NULL' ?></td>
                <td> <?= $row['landlord_pone'] !== null?$row['landlord_pone']:'NULL' ?></td>

                <td>
                  <?php if($row['house_doc'] !== null){ ?>
                   <img src="../userend/dashboard/uploads/<?= $row['house_doc'] ?>" width="50px" height="50px" alt="">

                <?php }else{  ?>
                       NULL
                  <?php } ?>
                  </td>

                  <td> <?= $row['owner_name'] !== null?$row['owner_name']:'NULL' ?></td>
                <td> <?= $row['owner_phon'] !== null?$row['owner_phon']:'NULL' ?></td>

                <td>
                  <?php if($row['medical_cert'] !== null){ ?>
                   <img src="../userend/dashboard/uploads/<?= $row['medical_cert'] ?>" width="50px" height="50px" alt="">

                <?php }else{  ?>
                       NULL
                  <?php } ?>
                  </td>                   


                <td> 
                  <?php if(($row['is_fit'] == null) || ($row['is_fit'] == "no") ){ ?>

                  <a href="users.php?fun=fit&id=<?php echo $row['id'];?>"> <i class="fa fa-toggle-off" style="color:#ff0000" aria-hidden="true"></i></a>
                  <br/>
                  NO

                  <?php }else{ ?>

                    <a href="users.php?fun=isfit&id=<?php echo $row['id'];?>"> <i class="fa fa-toggle-on" style="color:#00ff00" aria-hidden="true"></i></a>
                      <br/>
                      YES
                    <?php } ?>
              </td>

                <td> <?= $row['is_lock'] == null || $row['is_lock'] !== "yes" ?"Active":"Locked" ?></td>

                <td> 
                           
         
         <?php if((($row['is_lock']) == null) || (($row['is_lock']) == 'no') ){ ?>
         <a  class="text-white" href="users.php?fun=lock&id=<?php echo $row['id'];?>">
        <button title="Lock Account" style="padding:5px;margin:10px" class="btn btn-outline btn-sm btn-success">
        <i class="fa fa-lock" aria-hidden="true"></i></button>
        </a>
         <?php }else{ ?>
          <a  class="text-white" href="users.php?fun=unlock&id=<?php echo $row['id'];?>">
        <button title="Unlock Account" style="padding:5px;margin:10px" class="btn btn-outline btn-sm btn-danger">
        <i class="fa fa-lock" aria-hidden="true"></i></button>
        </a>
          <?php } ?>

        <a  class="text-white" href="users.php?fun=del&id=<?php echo $row['id'];?>">
        <button title="delete rep" style="padding:5px;margin:10px" class="btn btn-outline btn-sm btn-danger">
        <i class="fa fa-trash" aria-hidden="true"></i></button>
        </a>
                           
                         </td>
                </tr>
                <?php $cnt=$cnt+1; }?>

            </tbody>
                      <tfoot>
                                        <tr>

                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Surname</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Stage</th>
                    <th>State Of Residence</th>
                    <th>Residence Address</th>
                    <th>Utility Bill</th>                   
                    <th>Recent Passport/Photograph</th>
                    <th>Married?</th>
                    <th>Spouse Name</th>
                    <th>Spouse Number</th>
                    <th>Next of kin Name</th>
                    <th>Name of kin Number</th>
                    <th>Valid Id Card</th>
                    <th>Rented Apartment?</th>
                    <th>Landlord Name</th>
                    <th>Landlord Number</th>
                    <th>House Document</th>
                    <th>House Owner Name</th>
                    <th>House Owner Number</th>
                    <th>Medical Certificate</th>
                    <th>Medically Fit?</th>
                    <th>Account Status</th>
                    <th> Action </th>

                    </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card .-->


                <?php
   include "../adminend/footer.php";
 ?>
