<?php
include'connection.php';
include'sidebar.php';
include'function.php';
$sqlforjob = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job order by JOB_ID asc";
$result = mysqli_query($con, $sqlforjob) or die ("mysqli_error( $sqlforjob)");

$job  = "<select name='job' id = 'job' class = 'form-control' required>
        <option value ='' disabled selected hidden>select Job</option>";

        
  while ($row = mysqli_fetch_assoc($result)) {
    if($row['JOB_ID'] != 1){
        $job .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option> ";
    }
    else{
        $job .= "<option value='".$row['JOB_ID']."' disabled>".$row['JOB_TITLE']."</option> ";
    }
  }
    $job.= "</select>";
  ?><!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Add employee</title>
  </head>
  <body>
      <div id="content">

          <div class ="container">
              <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                    <h3>Add Employee</h3>
                    </div>
                  <form method = "POST">
                      <div class="card-body">
                        <div class="form-group">
                            <label for="fname">Firstname</label>
                            <input type="text" class="form-control"id="fname" name ="fname" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Lastname</label>
                            <input type="text"class = "form-control" id = "lname" name ="lname" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name = "gender"class = "form-control" id = " " required>
                                <option value ='' disable selected hidden>Select gender</option>
                                <option value = "male">Male</option>
                                <option value = "female">Female</option>
                        </select>
                        </div>
                        <div class="form-group">
                                <label for="branch">branch</label>
                                <?= $branch?>
                        </div>
                        <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class = "form-control" id = "email"name ="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class = "form-control" id = "phone"name ="phone"  pattern ="[0-9]{3}[0-9]{4}[0-9]{3}" required>
                        </div>
                        <div class="form-group">
                            <label for = "job">JOB</label>
                            <?= $job ?>
                        </div>
                        <div class="form-group">
                            <label for="hdate">Hired date</label>
                            <input type="date" class = "form-control" id = "hdate" name ="hdate" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class = "form-control" id = "address"name ="address" required>  
                        </div>
                    </div>
<div class="card-footer">
    <button class="btn btn-primary" name ="submit" type ="submit"> Submit</button>
    <button class="btn btn-info" type = "reset">Reset</button>
    <a href="employee.php" class="btn btn-secondary">Cancel</a>

</div>
                        
</form>
</div>
</div>
</div>
</body>
</html>
    <?php
    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname  = $_POST['lname'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email  = $_POST['email'];
        $jo = $_POST['job'];
        $hdate = $_POST['hdate'];
        $address = $_POST['address'];
        $branch = $_POST['branch'];
	$query = "SELECT email FROM employee WHERE email = '$email'";
	$result = mysqli_query($con,$query);
	$count = mysqli_num_rows($result);
    	if($count > 0){ 
	?>
	<script>
		alert("Email is already used please try another one");
		window.location = "addemployee.php";
</script>
<?php
	}
	$query = "SELECT phone FROM employee WHERE phone = '$phone'";
	$result = mysqli_query($con,$query);
	$count = mysqli_num_rows($result);
	if($count > 0){ 
	?>
	<script>
		alert("Phone number is already used please try another one");
		window.location = "addemployee.php";
</script>
<?php
	}
	$currentDate = date('Y-m-d');
	
		if($hdate > $currentDate && $hdate != $currentDate){
		?>
	<script>
		alert("Hired date cannot be in future");
		window.location = "addemployee.php";
</script>
<?php
	}
	else{
        $test ="INSERT INTO `employee` (`fname`, `lname`, `gender`, `email`, `phone`, `JOB_ID`, `Hired_date`, `address`,`branch_id`) VALUES ('$fname', '$lname', '$gender', '$email', '$phone', '$jo', '$hdate', '$address' ,'$branch')";
        $employee =mysqli_query($con, $test) or die(mysqli_error($con));
            ?>
            <script>
                alert("Successfully added employee");
                window.location= "employee.php";
            </script>
<?php
      
	}
  
	}   
    ?>