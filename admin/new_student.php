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
        Register Student
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Register Student</li>
      </ol>
    </section>

    <section class="content">
    
      <div class="row">
        <section class="col-lg-12">

          <div class="box box-info">
            <div class="box-header">
              <!-- <a href="new_students.php" class="btn btn-success">Upload list of students</a>&nbsp;&nbsp; -->
              <a href="students.php" class="btn btn-success">View All students</a><br><br>
              <i class="fa fa-user"></i>

              <h3 class="box-title">Student Information</h3>
		

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
if(isset($_GET['msgs'])) {
  $error = $_GET['msgs'];
  $used = $_GET['students'];
print '<div class="callout callout-warning">
        <h4>'.$error.'!</h4>valid, try to enter valid email!!
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
              <form action="new_std.php" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" name="name"  placeholder="Student Full Name" value="<?php
if(isset($_GET['msg']) || isset($_GET['msgs'])) {
  $name = $_GET['name'];
print $name;
}
?>" required>

                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="regno"  placeholder="Student Reg No (eg:BIT/18/09/12220/E)" value="<?php
if(isset($_GET['msg']) || isset($_GET['msgs'])) {
  $regno = $_GET['regno'];
print $regno;
}
?>"  required>

                </div>

                <div class="form-group">
                  <input type="email" class="form-control" name="email"  placeholder="Student Email" value="<?php
if(isset($_GET['msg']) || isset($_GET['msgs'])) {
  $email = $_GET['email'];
print $email;
}
?>" required>
                </div>
				 <div class="form-group">
                  <input type="text" class="form-control" name="address"  placeholder="Student Address" value="<?php
if(isset($_GET['msg']) || isset($_GET['msgs'])) {
  $address = $_GET['address'];
print $address;
}
?>" required>
                </div>
				<div class="form-group">
                  <select class="form-control" name="gender" required>
                    <option value="" disabled selected>Select gender</option>
                    <?php
                    if(isset($_GET['msg']) || isset($_GET['msgs'])) {
                      $gender = $_GET['gender'];
                    // print $gender;
                      if ($gender=='Male') {
                        ?>
                      <option value="Male" selected="">Male</option>
                    <option value="Female">Female</option>
                      <?php
                      }else{
                         ?>
                      <option value="Male">Male</option>
                    <option value="Female" selected="">Female</option>
                      <?php
                      }
                     
                    }else{
?>
                      <option value="Male">Male</option>
                    <option value="Female">Female</option>
                      <?php
                    }
                    ?>
                    
                  </select>
                </div>

                  <div class="form-group">
               
                             <?php

                        $conn = new mysqli('localhost', 'root', '', 'evaluation')
                        or die ('Cannot connect to db');

                            $result = $conn->query("SELECT * FROM `department` order by name");


                            echo "<select name='department' class='form-control' required >";
                            echo '<option value="">--- Select Department---</option>';
                            while ($row = $result->fetch_assoc()) {

                                          unset($id, $name);
                                          $id = $row['id'];
                                          $name = $row['name'];
                                          echo '<option value="'.$name.'">'.$name." ".$row['tax'].'</option>';

                        }

                            echo "</select>";

                ?>
                </div>
              
              
            </div>
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" name="newstd" id="sendEmail">Register Student
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
