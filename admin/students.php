<?php
include 'check_login.php';
include 'count_records.php';


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LES | Register Student</title>
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
 <?php include 'all_header.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Registered Students
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Registered Students</li>
      </ol>
    </section>

    <section class="content">
    
      <div class="row">
        <section class="col-lg-12">

          <div class="box box-info">
            <div class="box-header">
               <a href="new_student.php" class="btn btn-success">Add single students</a>&nbsp;&nbsp;<a href="students.php" class="btn btn-warning">View All students</a>&nbsp;&nbsp;
               <!-- <a href="new_students.php" class="btn btn-primary">Upload student list</a> -->
               <br><br>
              <i class="fa fa-users"></i>

              <h3 class="box-title">Students found on Database</h3>
		

            </div>
            <div class="box-body">
		<table class="table">
                <tbody><tr>
                
                  <th>Student Number</th>
                  <th>Full Name</th>
                  <th>Gender</th>
				  <th>Email</th>
          <th>Address</th>
				  <th>Reg. Date</th>
				  <th>Department</th>
				   <th>Options</th>
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
									   
			   $sql = "SELECT * FROM user_info where role = 'Student' ORDER BY full_name limit $page1,10";
             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
   
              while($row = $result->fetch_assoc()) {
             
			echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["full_name"]. "</td><td>". $row['gender']. "</td><td>". $row['email']. "</td><td>". $row['address']."</td><td>".$row['regdate']."</td><td>". $row['department']. "</td>";
		    print '<td><a title="Edit '.$row["full_name"].'" class="btn btn-block btn-primary btn-xs" href="update_std.php?ref='.$row["user_id"].'"><i class="fa fa-edit"></i></a>
			<a '; ?> 	<a onclick="return confirm('Are you sure you want to delete <?php echo $row['full_name']; ?> ?');" <?php print 'title="Delete '.$row["full_name"].'" class="btn btn-block btn-danger btn-xs" href="delete_std.php?ref='.$row["user_id"].'&page='.$page1.'"><i class="fa fa-trash-o"></i></a>
			
			</td>';
               }
               } else {
                print '<div class="callout callout-success">
        <h4>You have not registered any student</h4>
        Registered student will be shown here
      </div>';
                  }
                 $conn->close();
			   ?>
			   
              </tbody></table>
              <ul class="pagination">
			  <?php
						 include '../db_config/connection.php';
						$sql = "SELECT * FROM user_info where role = 'Student' ORDER BY full_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	print '<tr><td colspan="10">';
$ragents=mysqli_num_rows($result);
$a = $ragents/10;
$a = ceil($a);
for ($b=1;$b<=$a;$b++)
{
	?> <li class="paginate_button"><a href="students.php?page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a></li><?php
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
  <?php include 'footer.php';?>


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
