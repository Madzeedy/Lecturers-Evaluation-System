<?php
include 'check_login.php';
include 'count_records.php';


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LES | Evaluation Results</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="icon" href="../dist/img/icon.png">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'all_header.php';?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Evaluation Results
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Evaluation Results</li>
      </ol>
    </section>

    <section class="content">
    
      <div class="row">
        <section class="col-lg-12">

          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-file-text"></i>

              <h3 class="box-title">Evaluation Results</h3>
		

            </div>
            <div class="box-body">
		<table class="table">
                <tbody><tr>
                
                  <th>Result ID</th>
                  <th>Student No.</th>
				   <th>Student Name</th>
				   <th>Lecturer Name</th>
				   <th>Status</th>
				   <!-- <th>Option</th> -->
                </tr>
               <tbody>
			   <?php
			   
			   include '../db_config/connection.php';
			   error_reporting(0);
			    $page =$_GET['page'];
									   if ($page=="" || $page=="1")
									   {
										   $page1=0;
									   }else{
										   $page1=($page*10)-10;
									   }
									   
									   if(isset($_GET['ref'])) {
										   $condition = $_GET['ref'];
									   $sql = "SELECT results_info.*,user_info.full_name as fname FROM results_info INNER JOIN user_info ON user_info.user_id = results_info.lecturer_id  where results_info.status = '$condition' limit $page1,10 "; }else {
									   $sql = "SELECT results_info.*,user_info.full_name as fname FROM results_info INNER JOIN user_info ON user_info.user_id = results_info.lecturer_id   limit $page1,10";}
             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
   
              while($row = $result->fetch_assoc()) {
             
			echo "<tr><td>" . $row["result_id"]. "</td><td>" . $row["student_no"]. "</td><td>". $row['student_name']. "</td><td>" .$row['fname']. "</td><td>" . $row['status']."</td>";
		    
               }
               } else {
                print '</table><div class="callout callout-success">
        <h4>No Student attended evaluation</h4>
        Students who have attend the evaluation will be shown here
      </div>';
                  }
                 $conn->close();
			   ?>
			   
              </tbody></table>
              <ul class="pagination">
			  <?php
			  
			  if(isset($_GET['info'])) {
		
				 ?>
				 <script>
				 alert("Exam is now locked");
				 </script>
				 <?php
			  }
			    if(isset($_GET['err'])) {
			
				 ?>
				 <script>
				 alert("Could not lock exam");
				 </script>
				 <?php
			  }
			  	  if(isset($_GET['info2'])) {
		
				 ?>
				 <script>
				 alert("Exam is now unlocked");
				 </script>
				 <?php
			  }
			    if(isset($_GET['err2'])) {
			
				 ?>
				 <script>
				 alert("Could not unlock exam");
				 </script>
				 <?php
			  }
						 include '../db_config/connection.php';
						$sql = "SELECT * FROM results_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	print '<tr><td colspan="10">';
$ragents=mysqli_num_rows($result);
$a = $ragents/10;
$a = ceil($a);
for ($b=1;$b<=$a;$b++)
{
	?> <li class="paginate_button"><a href="results.php?page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a></li><?php
}
}
$conn->close();
						?>
			 
			  </ul>
              
            </div>
        
			</form>
          </div>
        </section>
      </div>

    </section>
  </div>
  <footer class="main-footer">
   
	<?php
			
			  
		
			    if(isset($_GET['db1'])) {
			
				 ?>
				 <script>
				 alert("Assessment reactivated successfully");
				 </script>
				 <?php
			  }
			  	  if(isset($_GET['db0'])) {
		
				 ?>
				 <script>
				 alert("Could not reactivate assessment");
				 </script>
				 <?php
			  }
			    if(isset($_GET['db3'])) {
			
				 ?>
				 <script>
				 alert("Could not delete students");
				 </script>
				 <?php
			  }?>
    <strong>Copyright &copy; <?php echo date('Y'); ?> </strong> All rights
    reserved.
  </footer>


  <div class="control-sidebar-bg"></div>
</div>

<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/pages/dashboard.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>
