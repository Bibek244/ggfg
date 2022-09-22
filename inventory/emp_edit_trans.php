<?php
include'connection.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $Employee_id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $query = "UPDATE employee SET fname = '$fname' , lname = '$lname',
     	gender = '$gender', email = '$email', address = '$address', phone = '$phone' 
         WHERE  Employe_Id  = '$Employee_id'";
     $result= mysqli_query($con,$query) ;
     if(!$result){
         echo "error".mysqli_error($con);
}
else{
    
    ?>
    <script>
        alert('Success!!!');
        window.location = 'employee.php';
        </script>
        <?php
}
}
else
?>
    <script>
        window.location = 'employee.php';
        </script>
 