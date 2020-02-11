<?php
include 'check_login.php';
?>

<?php


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OES | Assessment</title>
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
                  <small><?php echo"$regid"; ?> , Student</small>
                </p>
              </li>
          
              <li class="user-footer">
                <div class="pull-left">
                  <a href="./" class="btn btn-default btn-flat">Profile</a>
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
        Assessment Information
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Assessment Information</li>
      </ol>
    </section>

    <section class="content">


    <?php
include '../db_config/connection.php';

$sql = "SELECT * FROM results_info where student_no = '$regid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
    while($row = $result->fetch_assoc()) {
      $date = $row['date'];
      $score = $row['score'];
      	print '
	<div class="callout callout-success">
        <h4>Assessment Taken</h4>
        You have already attempt the exam on '. $row['date'].' , your score was '. $row['score'].'%
      </div>';
      if ($row['score']>=70) {
        ?>
        <button onclick="printDiv('printMe')" class="btn btn-success">Print your certificate</button><br><br>
        <div id="printMe">

                                            <div style="width:800px;color:grey;height:900px; padding:20px; text-align:center; border: 10px solid #535955" >
                                            <div style="width:750px; height:850px; padding:20px; text-align:center; border: 5px solid #787878">
                                              <!-- <h3>ESwahili </h3> -->
                                              <div  id="myhead">
<?php
include '../db_config/connection.php';
$sql = "SELECT * FROM school_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $name = $row['name'];
     $email = $row['email'];
     $address = $row['address'];
     $phone = $row['phone'];
     $slogan = $row['slogan'];
    }
} else {
  
}
$conn->close();
?>
<center>
</center>


<center>
<h3 style=" font-weight: bold;">
<?php 
$str = $name;
$str = strtoupper($name);
echo"$str"; ?>
</h3>
<p style="line-height: 35%; font-size: 14px;"><?php echo"$email"; ?></p>
<p style="line-height: 35%;font-size: 14px;"><?php echo"$address"; ?></p>
<p style="line-height: 35%; font-size: 14px;"><?php echo"$phone"; ?></p>
<i><p style="line-height: 35%; font-size: 14px;"><?php echo"$slogan"; ?></p></i>


<?php
include '../db_config/connection.php';
$sql = "SELECT * FROM school_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
echo '<img style="width:120px;" src="data:image/jpeg;base64,'.base64_encode($row['logo'] ).'" class="img-circle" alt="'.$name.'" title="'.$name.'"/>';
    }
} else {
  
}
$conn->close();
?>
</center>

</div><br/>
                                                   <span style="font-size:50px; font-weight:bold">CERTIFICATE OF COMPLETION</span>
                                                   <br><br>
                                                   <span style="font-size:20px"><i>This to certify that </i></span>
                                                   <br><br>
                                                   <span style="font-size:30px"><b><?php echo"$current_user"; ?></b></span><br/><br/>
                                                   <span style="font-size:20px"><i>has  successfully completed ICT Placement Test <br> on <b><?php echo $date; ?></b> <br>
                                                    with <?php echo $score; ?>%</i></span> <br/><br/>
                                                  
                                                  
                                                   <span style="font-size:25px"><i>Date issued</i></span><br>
                                                <?php echo  date("Y-m-d")."<br/>" ;  ?>
                                                 <span style="font-size:25px"><i>Signed by HOD (ICT) .</i></span><br>
                                                    <img src="./images/sign.jpg" style="width:200px;height:100px"><br/>
                                            </div>
                                            </div>
                                          </div>
                                            <button onclick="printDiv('printMe')" class="btn btn-success">Print your certificate</button>
                                          
                                            <script>
                                                function printDiv(divName){
                                                  var printContents = document.getElementById(divName).innerHTML;
                                                  var originalContents = document.body.innerHTML;
                                                  document.body.innerHTML = printContents;
                                                  window.print();
                                                  document.body.innerHTML = originalContents;
                                                }
                                              </script>
      <?php
      }
      
    }
} else {
  include '../db_config/connection.php';
  $sql = "SELECT * FROM examstate";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $examstate = $row['state'];


if ($examstate == "locked") {
	print '
	<div class="callout callout-warning">
        <h4>Assessment is locked!</h4>
        Assessment is not active
      </div>';
}else {
		print '
	<div class="callout callout-info">
        <h4>Assessment is active!</h4>
        Click'; ?> <a onclick="return confirm('Begin assessment ?');" href="exam.php">here</a><?php print ' to begin the assessment
      </div>';?>
      <div class="callout callout-danger">
      Exam will be closed on <?php echo $row['ending']; ?>
    </div>

    <div class="callout callout-warning">
      <?php $now = $row['ending']; ?>
      <?php  //echo date("F", strtotime($now)); ?>
      <?php  //echo date("d", strtotime($now)); ?>
      <?php  //echo date("H:i:s",strtotime($now)); ?>

      <?php  //echo $row['year']; ?>
<br>
      <?php 
        $month = date("F", strtotime($now));
        $day = date("d", strtotime($now));
        $hours = date("H:i:s",strtotime($now));
        $final= $month.' '.$day.', 2019 '.$hours;
        //echo $final;
      ?>
      <h4>Exam will be closed in</h4>
      <!-- new Date("Feb 25, 2020 17:17") date("H:i:s",strtotime($time)) -->
      <p id="demo"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $final ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
    </div>
    
      <?php
}

    }
} else {
 
}
$conn->close();
}
?>

<div class="row">



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
