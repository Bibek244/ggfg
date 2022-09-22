<?php
    require 'connection.php';
    include'sidebar.php';
    include"function.php";
?>
<?php
if($_GET['action']=="edit"){
$query = "SELECT Employe_Id, fname, lname, gender, email, phone, j.JOB_TITLE,j.JOB_ID,Hired_date, branch_id, address FROM employee e
join job j on j.JOB_ID = e.JOB_ID where e.Employe_Id = ".$_GET['id'];
$result = mysqli_query($con,$query);        
while ($row = mysqli_fetch_assoc($result)){
$id = $row['Employe_Id'];
$fn = $row['fname'];
$ln = $row['lname'];
$ge = $row['gender'];
$phone = $row['phone'];
$em = $row['email'];
$hd = $row['Hired_date'];
$ad = $row['address'];
$jt = $row['JOB_TITLE'];
$b_id = $row['branch_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit employee</title>
</head>
<body>
    <div id="content">
    <div class="container">

  

        <div class ="card shadow">
            <form method = "POST" action ="emp_edit_trans.php">
            <div class="card-header bg-primary text-white">
                    <h3>Edit employee</h3>
                </div>
            <div class="card-body">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <?php 
                if($jt !="Manager"){
                    $query = "SELECT * FROM branch WHERE branch_id = '$b_id'";
                    $result = mysqli_query($con,$query);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <div class= "form-group">
                    <label for ="branch">Branch</label>
                    <input type = "text" class ="form-control"  id ="branch"  value = "<?=$row['branch_name']?>" disabled>
                    </div><?php
                }
                ?>
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type ="text" class = "form-control" id= "fname" name = "fname" value ="<?php echo $fn?>">
                    </div>
                <div class="form-group">
                    <label for="lname">Last name</label>
                    <input type ="text" class= "form-control" id="lname"name = "lname" value ="<?php echo $ln?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name ="gender" value ="<?php echo $ge?>">
                            <option  name ="" disabled>Select gender</option>
                            <option  name ="male"  >Male</option>
                            <option  name ="female" >Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jobtitle">Role</label>
                        <input type ="text" class ="form-control" id ="jobtitle" value = "<?php echo $jt?>"  disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type ="email" class= "form-control"id= "email" name = "email" value =" <?php echo $em?>">
                    </div>
                    <div class="form-group">
                        <label for="hired_date">Hired date</label>
                        <input type ="date"  class = "form-control" id="hired_date" name = "hired_date" value ="<?php echo $hd?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type ="text" class = "form-control" id ="address" name = "address" value = "<?php echo $ad?>">  
                    </div>
                    <div class="form-group">
                        <label for="phone">Contact no</label>
                        <input type ="tel" pattern = "[0-9]{3}[0-9]{4}[0-9]{3}"class = "form-control" id="phone" name = "phone" value = "<?php echo $phone?>">
                    </div>
                </div>
                    <div class="card-footer">
                        <button type = "submit" class = "btn btn-warning btn-gradiant-warning">Submit</button>
                        <a class = "btn btn-secondary btn-gradiant-secondary" href ="employee.php">cancel</a>
                    </div>
</form>
</div>
</div>
</div>
<?php 
}
if($_GET['action'] =="delete"){
    $query = "SELECT * FROM login Where Employe_id =".$_GET['id'];
    $result = mysqli_query($con,$query);
    $count = mysqli_num_rows($result);
    if($count > 0){
    $query ="DELETE FROM login WHERE Employe_Id = ".$_GET['id'];
    $result =mysqli_query($con,$query);
    }
    $query ="DELETE FROM employee WHERE Employe_Id = ".$_GET['id'];
    $result =mysqli_query($con,$query);
    if(!$result){
        ?>
        <script>
            alert("Failed to delete account");
            window.location ="employee.php";
            </script>
            <?php
    }
    else{
        ?>
        <script>
            alert("Succesfully deleted account");
            window.location ="employee.php";
            </script>
 <?php
    }
}
?>
</body>
    </html>