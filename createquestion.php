<?php
include "../adminend/header.php";

if(isset($_GET['form_id'])){

  $_SESSION['form_id'] = $_GET['form_id'];

}


  function form($fid){

    include 'dbconnection.php';

    $ret= mysqli_query($con,"SELECT * FROM forms WHERE id='$fid' ");
    $num=mysqli_fetch_array($ret);
    return $num;
  }

  function option($formfield_id){

    define('DB_SERVER','localhost');
    define('DB_USER','afolabi');
    define('DB_PASS' ,'afolabi50874075');
    define('DB_NAME', 'korepedb');
    $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

    $ret= mysqli_query($con,"SELECT * FROM form_options WHERE formfield_id='$formfield_id' ");
    $num=mysqli_fetch_array($ret);
    return $num;

  }

  // creating form
if(isset($_POST['createquestion']))
{

  foreach ($_POST['question'] as $key => $value) {
	$quest = $value;
	$compulsory = $_POST['compulsory'][$key];
  $answer_type = $_POST['answer_type'][$key];
  $form_id = $_POST['form_id'][$key];
  $msg=mysqli_query($con,"insert into form_fields(form_id,question,compulsory,answer_type) values('$form_id','$quest','$compulsory','$answer_type')");

    $lastid = $con->insert_id;

   if($answer_type == "option" || $answer_type == "multi_option"){
     $option = $_POST['option'][$key];
     mysqli_query($con,"insert into form_options(form_id,formfield_id,option_value) values('$form_id','$lastid','$option')");
   }

}

if($msg)
{
  $extra="createquestion.php";
  $_SESSION['msg'] = "Form Successfully Created";
  $_SESSION['color'] = "success";
  $host=$_SERVER['HTTP_HOST'];
  $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
  header("location:http://$host$uri/$extra");

}else{

  $extra="createquestion.php";
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
		$msg=mysqli_query($con,"delete from form_fields where id='$fid'");
		if($msg)
		{
      mysqli_query($con,"delete from answers where formfield_id='$fid'");
      mysqli_query($con,"delete from form_options where formfield_id='$fid'");
			$extra="createquestion.php";
		  $_SESSION['msg'] = "Question Successfully deleted";
		  $_SESSION['color'] = "success";
		  $host=$_SERVER['HTTP_HOST'];
		  $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		  header("location:http://$host$uri/$extra");
		}else{
			$extra="createquestion.php";
			$_SESSION['msg'] = "Something went wrong,please try again";
			$_SESSION['color'] = "danger";
			$host=$_SERVER['HTTP_HOST'];
			$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
			header("location:http://$host$uri/$extra");
		}


  }

}

function no_of_questions($form_id){
	 //return $form_id;
	 $rs=mysqli_query($con,"SELECT COUNT('id') AS total FROM forms WHERE id > 1");
	 $ctr=mysqli_fetch_assoc($rs);
	 $position_nums = $ctr['total'];
		return $position_nums;
  // return 1;
}

 ?>


 <div class="row">

   <div class="col-md-2">
 </div>

 <div class="col-md-8">

  <?php if(isset($_SESSION['msg']) && ($_SESSION['msg'] !== '' )) { ?>
   <div class="alert alert-<?= $_SESSION['color'] ?> alert-dismissible fade show" role="alert">
  <?= $_SESSION['msg'] ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php $_SESSION['msg'] = ''; $_SESSION['color'] = ''; } ?>

    <div class="card card-primary">

            <div class="card-header">
              <h3 class="card-title">
                <center>CREATE QUESTION</center>
              </h3>
                <button type="button" class="btn btn-primary add-button btn-sm float-right"><i class="fa fa-plus"></i></button>
            </div>

            <form name="" method="post" action="" enctype="multipart/form-data">

            <div class="card-body">

              <div class="form-wrapper">

        <div class="first-form">
              <div class="form-group">
                    <label for="exampleInputEmail1">Form<span style="color:red">*</span></label>
                    <input type="hidden" value="<?= $_GET['form_id'] ?>" name="form_id[]">
                    <input type="text" readonly  value="<?= form($_SESSION['form_id'])['name'] ?>" class="form-control" value="<?= $_SESSION['form_id'] ?>" id="exampleInputEmail1" required>
              </div>

            <div class="form-group">
                  <label for="exampleInputEmail1">Question<span style="color:red">*</span></label>
                  <textarea name="question[]" class="form-control" id="exampleInputEmail1" required placeholder="e.g:First Name"></textarea>
            </div>

            <div class="form-group">
                  <label for="exampleInputEmail1">Compulsory<span style="color:red">*</span></label>
                  <select name="compulsory[]" class="form-control"  required >
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
              </select>
                </div>

            <div class="form-group">
                  <label for="exampleInputEmail1">Answer Type<span style="color:red">*</span></label>
              <select name="answer_type[]" class="form-control" required >
                    <option value="">Select Option</option>
                    <option value="text">Text</option>
                    <option value="number">Number</option>
                    <option value="date">Date</option>
                    <option value="file">File</option>
                    <option value="option">Option</option>
                    <option value="multi_option">Multi Option</option>
              </select>
                </div>

                <div class="form-group">
                      <label for="exampleInputEmail1">Options<span style="color:red">(Required if answer type is option/multi option)</span></label>
                      <textarea name="option[]" class="form-control" id="exampleInputEmail1"  placeholder="Use comma to seperate option,E.G: yes,no"></textarea>
                </div>

              </div>

 </div>
            <input type="submit" class="btn btn-primary" name="createquestion"  value="SUBMIT" >

             </div>
               </form>

                </div>

  </div>
  <!-- end col-md-8 -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
jQuery(document).ready(function(){
    var maxLimit = 5;
    var appendHTML = `<div class="input-wrapper">
      <hr/>
      <button type="button" class="btn btn-primary remove-button btn-sm float-right"><i class="fa fa-minus"></i></button>
          <div class="form-group">
                <label for="exampleInputEmail1">Form
                  <span style="color:red">*</span></label>
                <input type="hidden" value="<?= $_GET['form_id'] ?>" name="form_id[]">
                <input type="text" readonly  value="<?= form($_SESSION['form_id'])['name'] ?>" class="form-control" value="<?= $_SESSION['form_id'] ?>" id="exampleInputEmail1" required>
          </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Question<span style="color:red">*</span></label>
                <textarea name="question[]" class="form-control" id="exampleInputEmail1" required placeholder="e.g:First Name"></textarea>
          </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Compulsory<span style="color:red">*</span></label>
                <select name="compulsory[]" class="form-control"  required >
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
            </select>
              </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Answer Type<span style="color:red">*</span></label>
            <select name="answer_type[]" class="form-control" required >
                  <option value="">Select Option</option>
                  <option value="text">Text</option>
                  <option value="number">Number</option>
                  <option value="date">Date</option>
                  <option value="file">File</option>
                  <option value="option">Option</option>
                  <option value="multi_option">Multi Option</option>
            </select>
              </div>

              <div class="form-group">
                    <label for="exampleInputEmail1">Options<span style="color:red">(Required if answer type is option/multi option)</span></label>
                    <textarea name="option[]" class="form-control" id="exampleInputEmail1"  placeholder="Use comma to seperate option,E.G: yes,no"></textarea>
              </div>
              </div>`;

    var x = 1;

    // for addition
    jQuery('.add-button').click(function(e){
      e.preventDefault();
        if(x < maxLimit){
            jQuery('.form-wrapper').append(appendHTML);
            x++;
        }
    });

    // for deletion
    jQuery('.form-wrapper').on('click', '.remove-button', function(e){
        e.preventDefault();
        jQuery(this).parent('div').remove();
        x--;
    });
});

</script>

   <div class="col-md-2">
 </div>

 </div>


 <div class="card">
       <div class="card-header">
         <h3 class="card-title">Questions </h3>
       </div>
       <!-- /.card-header -->
       <div class="card-body">
         <table id="korepedatatable" class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
           <thead>

             <tr>
              <th>Form</th>
              <th>Question</th>
              <th>Answer Type</th>
              <th>Options</th>
               <th> Compulsory </th>
               <th> Action </th>
            </tr>

           </thead>
           <tbody>
           <?php $fid = $_SESSION['form_id']; $ret=mysqli_query($con,"select * from form_fields where form_id = $fid");
    $cnt=1;
    while($row=mysqli_fetch_array($ret))
    {?>
      <tr>
             <td> <?= form($row['form_id'])['name'] ?> </td>
             <td> <?= $row['question'] ?></td>
             <td> <?= str_replace("_"," ",$row['answer_type']) ?></td>
             <td> <?php
              if($row['answer_type'] == "option" || $row['answer_type'] == "multi_option"){
               echo  option($row['id'])['option_value'];
              }else{
              echo "NULL";
              }
              ?></td>
             <td> <?= $row['compulsory'] ?></td>
             <td>
               <a  class="text-white" href="createquestion.php?fun=del&id=<?php echo $row['id'];?>">
               <button title="delete form" style="padding:5px;margin:10px" class="btn btn-outline btn-sm btn-danger">
               <i class="fa fa-trash" aria-hidden="true"></i></button>
               </a>
              </td>
     </tr>
     <?php $cnt=$cnt+1; }?>

 </tbody>
           <tfoot>
             <tr>
              <th>Form</th>
              <th>Question</th>
              <th>Answer Type</th>
              <th>Options</th>
               <th> Compulsory </th>
               <th> Action </th>
            </tr>
           </tfoot>
         </table>
       </div>
       <!-- /.card-body -->
     </div>
     <!-- /.card -->

<?php
include "../adminend/footer.php";
 ?>
