<?php

include 'connection.php';
include'topbar.php';
$currentuser =  $_SESSION['USERNAME'];
$query = "SELECT id, username,fname, lname, gender, email, phone, JOB_TITLE, Hired_date, address, TYPE FROM login l
JOIN employee e ON e.Employe_id = l.Employe_id
JOIN type t ON t.TYPE_ID = l.TYPE_ID
JOIN job j ON j.JOB_ID  = e.JOB_ID
 WHERE id = '$_SESSION[Member_ID]'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));       
if($result){
    if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
            $eid = $row['id'];
            $user =  $row['username'];
            $fn = $row['fname'];
            $ln = $row['lname'];    
            $ge = $row['gender'];
            $em = $row['email'];
            $hd = $row['Hired_date'];
            $ad = $row['address'];
            $jt = $row['JOB_TITLE'];
            $ty = $row['TYPE'];
            $phone = $row['phone'];
        }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    
    <div class="container">
        <div class ="card shadow gradient-buttons">
    <div class="card-header bg-primary text-white">
        <h3>Profile</h3>       
    </div>
        <form method = "POST">
              <div class="card-body">
                  <?php
                if($_SESSION['TYPE'] !="admin"){
?>
                    <div class="form-group">
                        <label for ="branch">Branch</label>
                        <input type = "text" class ="form-control"  id ="branch"  value = "<?=$_SESSION['B_NAME']?>" disabled>
                    </div>
                <?php 
            } ?>
                
                <div class="form-group">
                    <label for ="username">Username</label>
                    <input type = "text" class ="form-control" name ="username" id ="username"  value = "<?php echo $user?>" disabled>
                </div>
                
                
                <div class="form-group">
                    <label for="fname">First name</label>
                    <input type ="text"class="form-control" id ="fname " name = "fname" value ="<?php echo $fn ?>">
                </div>
                <div class="form-group">
                    <label for="lname">Last name</label>
                    <input type ="text"class="form-control" id ="lname" name = "lname" value ="<?php echo $ln?>">

                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name ="gender"class="form-control" id ="gender" value ="<?php echo $ge?>">
                        <option  name ="" disabled>Select gender</option>
                        <option  value ="Male"  >Male</option>
                        <option  value ="Female" >Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jobtitle">Role</label>
                    <input type ="text" class="form-control" id ="jobtitle"value = "<?php echo $jt?>"  disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type ="email"class="form-control" id ="email" name = "email" value =" <?php echo $em?>">

                </div>
                <div class="form-group">
                    <label for="hired_date">Hired date</label>
                    <input type ="date" class="form-control" id ="hired_date"name = "hired_date" value ="<?php echo $hd?>" disabled>
                    
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type ="text" class="form-control" id ="address"name = "address" value = "<?php echo $ad?>">  
                </div>
                <div class="form-group">
                    <label for="phone">Contacts</label>
                    <input type ="tel" class="form-control" id = "phone"  pattern = "[0-9]{3}[0-9]{4}[0-9]{3}" name = "phone" value = "<?php echo $phone?>">
                </div>
                
            </div>
            <div class="card-footer">
                
                <button type = "submit"  class = "btn  btn-primary ">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $query = "UPDATE login l
                            JOIN employee e ON e.Employe_id = l.Employe_id
                            SET e.fname = '$fname', e.lname ='$lname', e.gender = '$gender', e.email = '$email',
                            e.gender = '$gender',e.address='$address',e.phone = '$phone'
                            WHERE id  ='$_SESSION[Member_ID]' ";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    ?>
    <script>
        alert("logging out to apply changes");
        window.location = "logout.php";
        </script>
        <?php
}
?>
