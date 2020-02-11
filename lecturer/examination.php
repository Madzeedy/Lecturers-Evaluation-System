<?php
include 'check_login.php';
include 'count_records.php';


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OES | Examination Update</title>
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

  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>O</b>ES</span>
      <span class="logo-lg"><b>Examination</b> System</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
								  <?php
			  include '../db_config/connection.php';
			  
			  $sql = "SELECT * FROM user_info where user_id='$myusername' or email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
        
                while($row = $result->fetch_assoc()) {
                 $avatar = $row['avatar'];
				 $gender = $row['gender'];
				 $regid = $row['user_id'];
				 if ($avatar == null) {
					 if ($gender == "Male") {
						 print '<img src="../dist/img/avatar.png" class="user-image" alt="'.$current_user.'" title="'.$current_user.'">';
					 }else {
						 print '<img src="../dist/img/avatar3.png" class="user-image" alt="'.$current_user.'" title="'.$current_user.'">';
					 }
					 
				 }else{
					   echo '<img src="data:image/jpeg;base64,'.base64_encode($row['avatar'] ).'" class="user-image" alt="'.$current_user.'" title="'.$current_user.'"/>';
				 }
                     }
                   } else {
                
                  }
                   $conn->close();
			  
			  ?>
          
              <span class="hidden-xs"><?php echo"$current_user"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
			  
			  <?php
			  include '../db_config/connection.php';
			  
			  $sql = "SELECT * FROM user_info where user_id='$myusername' or email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
        
                while($row = $result->fetch_assoc()) {
                 $avatar = $row['avatar'];
				 $gender = $row['gender'];
				 $regid = $row['user_id'];
				 if ($avatar == null) {
					 if ($gender == "Male") {
						 print '<img src="../dist/img/avatar.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
					 }else {
						 print '<img src="../dist/img/avatar3.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
					 }
					 
				 }else{
					  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['avatar'] ).'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
				 }
                     }
                   } else {
                 
                  }
                   $conn->close();
			  
			  ?>
                

                <p>
                  <?php echo"$current_user"; ?>
                  <small><?php echo"$regid"; ?> , Admin</small>
                </p>
              </li>
          
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
   
        </ul>
      </div>
    </nav>
  </header>
 <?php include 'header.php';?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Examination Update
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Examination Update</li>
      </ol>
    </section>

    <section class="content">
    
      <div class="row">
        <section class="col-lg-12">

          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-file-text"></i>

              <h3 class="box-title">Examination Questions</h3>
		

            </div>
            <div class="box-body">
		<table class="table">
                <tbody><tr>
                
                  <th>#</th>
                  <th>Subject</th>
                  <th>Question</th>
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
									   
			   $sql = "SELECT * FROM exam limit $page1,10";
             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
   
              while($row = $result->fetch_assoc()) {
             
			echo "<tr><td>" . $row["question_id"]. "</td><td>" . $row["subject"]. "</td><td>" . $row["question"]. "</td>";
		    print '<td><a title="Edit '.$row["question"].'" class="btn btn-block btn-primary btn-xs" href="update_quest.php?ref='.$row["question_id"].'&page='.$page.'"><i class="fa fa-edit"></i></a>'?>
        <a onclick="return confirm('Are you sure you want to delete <?php echo $row['full_name']; ?> ?');" <?php print 'title="Delete '.$row["full_name"].'" class="btn btn-block btn-danger btn-xs" href="delete_question.php?ref='.$row["question_id"].'"><i class="fa fa-trash-o"></i></a>

		
			
			</td>';
               }
               } else {
                print '</table><div class="callout callout-success">
        <h4>No examination question found</h4>
        examination questions will be shown here
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
						$sql = "SELECT * FROM exam";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	print '<tr><td colspan="10">';
$ragents=mysqli_num_rows($result);
$a = $ragents/10;
$a = ceil($a);
for ($b=1;$b<=$a;$b++)
{
	?> <li class="paginate_button"><a href="examination.php?page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a></li><?php
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
