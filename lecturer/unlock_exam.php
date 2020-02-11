<?php
include 'check_login.php';
include '../db_config/connection.php';
 $dateending = $_POST['dateending'];
$timeending = $_POST['timeending'];

$startime = date("H:i");
$current = date('H:i',strtotime('+3 hour',strtotime($startime)));

$today = date("Y-m-d");
if ($dateending==$today && $timeending<$current) {
	?>
	<script type="text/javascript">
		alert("Please select valid time!!");
		window.location.href="lock_exams.php"
	</script>
	<?php
}else{
	$today =date("Y");
	$ending = $dateending." ".$timeending;
 $sql = "UPDATE examstate SET state='unlocked',ending='$ending'";

if ($conn->query($sql) === TRUE) {
   header("location:examination.php?info2=Exam is now unlocked");
} else {
   header("location:examination.php?err2=Could not unlock exam");
}

}


$conn->close();

?>