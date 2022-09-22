<?php
include'connection.php';
include'sidebar.php';
confirm_logged_in();
?>
<div id="content">
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h3>Add Supplier</h3>
            </div>
            <div class="card-body">
                <form method ="POST">
                <div class="form-group">
                    <label for = "company">Company name</label>
                    <input type = "text" class= "form-control" id = "company" name = "company" required>
                </div>
                <div class="form-group">
                    <label for = "address">Address</label>
                <input type = "text" class= "form-control" id = "address"name = "address" required>
                </div>
                <div class="form-group">
                    <label for = "phone">Phone number</label>
                    <input type = "tel" class= "form-control" id = "phone"pattern = "[0-9]{3}[0-9]{4}[0-9]{3}" name ="phone"  required>
                </div>
            </div>
            <div class="card-footer">
                <button type = "submit" name = "submit" class="btn btn-primary">submit</button>
                <button type = "reset" class="btn btn-warning">reset</button>
                <a href="supplier.php" class="btn btn-secondary">Cancel</a>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
   $company = $_POST['company'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];
	$query = "SELECT Company_name FROM supplier WHERE Company_name = '$company'";
	$result = mysqli_query($con,$query);
	$count = mysqli_num_rows($result);
    	if($count > 0){ 
	?>
	<script>
		alert("COMPANY IS ALREADY REGISTERED!!!");
		window.location = "addsup.php";
</script>
<?php
	}
	$query = "SELECT Phone FROM supplier WHERE Phone = '$phone'";
	$result = mysqli_query($con,$query);
	$count = mysqli_num_rows($result);
    	if($count > 0){ 
	?>
	<script>
		alert("This phone number is already registered!!!");
		window.location = "addsup.php";
</script>
<?php
	}
	else{
   $query = "INSERT INTO `supplier` (`Supplier_id`, `Company_name`, `Address`, `Phone`) VALUES (NULL, '$company', '$address', '$phone');";
   $result = mysqli_query($con,$query);
   if(!$result){
      ?>
	  <script>
	  alert("failed to register supplier");
	  </script>
	  <?php
   }
}
}

?>