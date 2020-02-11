  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
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
					 
				 }else {
					  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['avatar'] ).'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
				 }
                     }
                   } else {
                 
                  }
                   $conn->close();
			  
			  ?>
      
        </div>
        <div class="pull-left info">
          <p><?php echo"$current_user"; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         <li class="treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
   
          </a>
         <!--  <ul class="treeview-menu">
            <li><a href="index.php"><i class="fa fa-circle-o"></i> Configuration</a></li>
           
          </ul> -->
        </li>

       <!--   <li class="treeview">
          <a href="results.php">
            <i class="fa fa-book"></i>
            <span>Marks</span>
   
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php"><i class="fa fa-circle-o"></i> Configuration</a></li>
           
          </ul>
        </li> -->

        <li class="treeview">
          <a href="results.php">
            <i class="fa fa-book"></i>
            <span>Results</span>
   
          </a>
          <ul class="treeview-menu">
            <li><a href="results.php"><i class="fa fa-circle-o"></i> All Results</a></li>
             <li><a href="results.php?ref=FAIL"><i class="fa fa-circle-o"></i> Failed Student</a></li>
            <li><a href="results.php?ref=PASS"><i class="fa fa-circle-o"></i> Passed Student</a></li>
          </ul>
        </li>

        <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Students</span>
   
          </a>
          <ul class="treeview-menu">
            <li><a href="new_student.php"><i class="fa fa-circle-o"></i> Register New Student</a></li>
            <li><a href="students.php"><i class="fa fa-circle-o"></i> Customize Students</a></li>
          </ul>
        </li> -->

      <!--    <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Lecturers</span>
   
          </a>
          <ul class="treeview-menu">
            <li><a href="new_lecturer.php"><i class="fa fa-circle-o"></i> Register New Lecturer</a></li>
            <li><a href="lecturers.php"><i class="fa fa-circle-o"></i> Customize Lecturers</a></li>
          </ul>
        </li> -->

        <li>
     	  <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Examination</span>
   
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="results.php"><i class="fa fa-circle-o"></i> Results</a></li> -->
           <li><a href="examinations.php"><i class="fa fa-plus"></i> Add new questions</a></li>
           <li><a href="examination.php"><i class="fa fa-list"></i> All Questions</a></li>
		   <li><a href="lock_exam.php"><i class="fa fa-lock"></i> Lock Exam</a></li>
		   <li><a href="lock_exams.php"><i class="fa fa-unlock"></i> Unlock Exam</a></li>
          </ul>
        </li>
		
		<!--   <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Email</span>
   
          </a>
          <ul class="treeview-menu">
            <li><a href="email_config.php"><i class="fa fa-circle-o"></i> Configuration</a></li>
           
          </ul>
        </li>
 -->
        <!-- <li class="header">SYSTEM</li>
     	  <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Database</span>
   
          </a>
          <ul class="treeview-menu">
            <li><a <a onclick="return confirm('Are you sure you want to delete all students ?');" href="delete_students.php"><i class="fa fa-circle-o"></i> Delete all students</a></li>
           <li><a <a onclick="return confirm('Are you sure you want to delete all results ?');" href="delete_results.php"><i class="fa fa-circle-o"></i> Delete all results</a></li>

            <li><a <a onclick="return confirm('Are you sure you want to delete all lecturers ?');" href="delete_lecturer.php"><i class="fa fa-circle-o"></i> Delete all Lecturer</a></li>
          </ul>
        </li> -->
      </ul>
    </section>
 
  </aside>