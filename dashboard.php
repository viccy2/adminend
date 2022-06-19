<?php
include "header.php";
  //$userdets = $_SESSION['userdets'];
  // $result=mysqli_query("SELECT COUNT(id) AS ttl FROM users");
  //  $counter=mysqli_fetch_assoc($result);
 ?>

        <!-- Info boxes -->
        <div class="row" >
          <div class="col-12 col-sm-6 col-md-3" >
            <div class="info-box" style='background:#121212;color:white'>
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content"  >
                <span class="info-box-text">Social Accounts</span>
                <span class="info-box-number">
                 <?=  $nsocials ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style='background:#121212;color:white'>
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Aged Accounts</span>
                <span class="info-box-number"><?= $nsaccts  ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style='background:#121212;color:white'>
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">BOUGHT AGED ACCOUNTS</span>
                <span class="info-box-number"><?= $nbsaccts ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3" >
            <div class="info-box mb-3" style='background:#121212;color:white'>
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content" >
                <span class="info-box-text">ADMINS</span>
                <span class="info-box-number">1</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->



            <!-- TABLE: LATEST ORDERS -->
            <div class="card d-flex justify-content-center" style='background:#121212;color:white'>
              <div class="card-header border-transparent">
                <h3 class="card-title">SOCAIL ACCOUNTS</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>

                      <?php
                      $cnt=1;
                      $forms = mysqli_query($con,"select * from socials");
      							  while($stage=mysqli_fetch_array($forms))
                         { ?>

                    <tr>
                      <td><a href="#"><?= $cnt ?></a></td>
                      <td><?= $stage['name'] ?></td>

                    </tr>

                    <?php $cnt=$cnt+1; }?>


                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->



              <!-- /.card-footer -->
            </div>
            <!-- /.card -->


            <?php
include "footer.php";
 ?>
