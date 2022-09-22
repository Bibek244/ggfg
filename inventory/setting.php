<?php
include'connection.php';
include'topbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Setting</title>
</head>
<body>
    <div class="container">

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Setting</h3>
            </div>
            <div class="card-body">
                <form method="POST">
            <div class="form-group">

                <label for="oldpassword">Old password</label>
                <input type="password" name="oldpassword" id="oldpassword" class="form-control" placeholder="old password" required>
                <label for="newpassword">New Password</label>
                <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="new password" required> 
                 <label for="confirmpassword">Confirm Password</label>
                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="confirm password" required>
            </div>
            </div>
            <div class="card-footer">
            <button type ="submit" class="btn btn-danger">Change</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </form>
            </div>
            
        </div>
        </div>
    </body>
    </html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $op = $_POST['oldpassword'];
    $np = $_POST['newpassword'];
    $cp = $_POST['confirmpassword'];
    if($np!=$cp){
        ?>
        <script>
            alert("New Password and Confirm Password doesnot match");
            </script>
            <?php
    }
    else{
    
        $query = "SELECT password FROM login WHERE id ='$_SESSION[Member_ID]'";
        $get = mysqli_query($con,$query) or die(mysqli_error($con));
        while($row =mysqli_fetch_row($get)){
         $password= $row[0];
        
        }
        if($password != sha1($op)){
            ?>
            <script>
            alert("Wrong password please use correct password");
            </script>
            <?php
        }
        else{
            $cp = sha1($np);
            $query  = "UPDATE login SET password ='$cp' WHERE id = '$_SESSION[Member_ID]'";
            $result =  mysqli_query($con,$query) or die(mysqli_error($con));
            ?>
            <script>
            alert("Password changed successfully");
            </script>
            <?php
        }
    }
    
}
?>