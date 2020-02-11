<?php
include 'check_login.php';
include 'count_records.php';
if(isset($_GET['ref'])) {
	$quid = $_GET['ref'];
	include '../db_config/connection.php';
	
	$sql = "SELECT * FROM exam where question_id = '$quid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $question = $row['question'];
		$opt1 = $row['option1'];
		$opt2 = $row['option2'];
		$opt3 = $row['option3'];
		$opt4 = $row['option4'];
		$answer = $row['answer'];
    }
} else {
  
}
$conn->close();

}else{
	header("location:./");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LES | <?php echo"$quid"; ?></title>
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
        Update Exam <?php echo"$quid"; ?>
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Exam <?php echo"$quid"; ?></li>
      </ol>
    </section>

    <section class="content">
    
      <div class="row">
        <section class="col-lg-12">

          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-file-text"></i>

              <h3 class="box-title"><?php echo"$quid"; ?> </h3>
		

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
$pagee = $_GET['page'];
?>
              <form action="up_ex.php?ref=<?php echo"$quid"; ?>&page=<?php echo"$pagee";?>" method="post">
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="question" placeholder="Question" required><?php echo"$question"?></textarea>
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="option1" placeholder="Option 1" required><?php echo"$opt1"?></textarea>
                </div>
				 <div class="form-group">
                  <textarea class="form-control" rows="3" name="option2" placeholder="Option 2"  required><?php echo"$opt2"?></textarea>
                </div>
				 <div class="form-group">
                  <textarea class="form-control" rows="3" name="option3" placeholder="Option 3"  required><?php echo"$opt3"?></textarea>
                </div>
				 <div class="form-group">
                  <textarea class="form-control" rows="3" name="option4" placeholder="Option 4"  required><?php echo"$opt4"?></textarea>
                </div>
				 <div class="form-group">
                  <textarea class="form-control" rows="3" name="answer" placeholder="Answer"  required><?php echo"$answer"?></textarea>
                </div>

              
              
            </div>
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" name="newstd" id="sendEmail">Update Question
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
