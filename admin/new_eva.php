<?php
if(isset($_POST['newstd'])) {
$stdname = $_POST['name'];
$lecturer = $_POST['lecturer'];
$subject = $_POST['module'];
}else{
	header("location:./");
}

include '../db_config/connection.php';

	$conn = new mysqli('localhost', 'root', '', 'evaluation')
                        or die ('Cannot connect to db');

                            $result = $conn->query("SELECT * FROM `user_info` where user_id='$lecturer'");
                            $row = $result->fetch_assoc();

                                          unset($id, $name);
                                          $id = $row['user_id'];
                                          $department = $row['department'];
                                         
                        

$sql = "SELECT * FROM evaluations where name = '$stdname'  and lecturer_id = '$lecturer' and subject_id = '$subject'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		$student = $row['full_name'];
       header("location:new_evaluation.php?msg=Already in the system..!!");
    }
} else {
  $regdate = date('jS \ F Y h:i:s A');
$stdno = 'EVID:'.rand(1000,9999).'/'.rand(10,99).'/'.rand(0,9).'';

include '../db_config/connection.php';

$sql = "INSERT INTO evaluations (id,name, lecturer_id, subject_id, department)
VALUES ('$stdno', '$stdname', '$lecturer', '$subject', '$department')";

if ($conn->query($sql) === TRUE) {
    header("location:new_evaluation.php?message=$stdno have been registered&id=$stdno");
} else {
	$error = $conn->error;
     header("location:new_evaluation.php?err=$error");
}

$conn->close();



}
		
$conn->close();

?>


