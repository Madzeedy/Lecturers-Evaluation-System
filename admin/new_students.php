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
        Register Students
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Register Students</li>
      </ol>
    </section>

    <section class="content">
    
      <div class="row">
        <section class="col-lg-8 col-lg-offset-2">

          <div class="box box-info">
            <div class="box-header">
               <a href="new_student.php" class="btn btn-success">Add single new student</a>&nbsp;&nbsp;<a href="students.php" class="btn btn-warning">View All students</a><br><br>
              <i class="fa fa-user"></i>

              <h3 class="box-title">Upload a list of students</h3>
		

            </div>
            <div class="box-body">
			<?php
if(isset($_GET['msg'])) {
	$error = $_GET['msg'];
	$used = $_GET['student'];
print '<div class="callout callout-warning">
        <h4>'.$error.'!</h4>
        Email is used by '.$used.' please select another email
      </div>';
}
?>

			<?php
if(isset($_GET['message'])) {
	$error = $_GET['message'];
print '<div class="callout callout-success">
        <h4>'.$error.'</h4>
        Default password is 123456
      </div>';
}
?>




<?php
if(isset($_POST["newstd"]))
{



 $dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "exam_system";
$conn = mysqli_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysqli_select_db($conn ,$dbname) or die('database selection problem');

 $regdate = date('jS \ F Y h:i:s A');


    if($_FILES['file']['name'])
  {
    $filename = explode("." , $_FILES['file']['name']);
    if($filename[1] == 'csv')
        {
                            $file = $_FILES['file']['tmp_name'];
                $handle = fopen($file, "r");
                $c = 0;
                while(($data = fgetcsv($handle, 1000, ",")) !== false)
                {


                
                $item1= $data[0];
                $item2= $data[1];
                $item3= $data[2];
                $item4= $data[3];
                $item5= $data[4];
                $item6= $data[5];




                  
                $sql = mysqli_query($conn , "INSERT INTO user_info (user_id, full_name, gender, email, address, regdate, department) 
                  VALUES ('$item1','$item2','$item3','$item4','$item5','$regdate','$item6')");
                $c = $c + 1;
                }
                
                if($sql){
                
                ?>
                <script>
                 alert("Student list successfully uploaded.!! ");
                </script>
                <?php
                }else{
                 
                ?>
                <script>
                 alert("You are trying to upload student that are already in the system!!. ");
                </script>
                <?php
                }
        }
        else
        {
            echo "please upload a csv file";
        }
    }


}
?>

              <form enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <input type="file" class="form-control" name="file"  placeholder="Student Full Name" required>

                </div>
               
              
              
            </div>
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-primary" name="newstd" id="sendEmail">Register Student
                <i class="fa fa-arrow-circle-up"></i></button>
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
