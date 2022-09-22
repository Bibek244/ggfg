<?php
require'connection.php';
require'sidebar.php';

if($_GET['action'] == "edit"){
 $query="SELECT *  FROM supplier WHERE Supplier_id  = '$_GET[id]' ";
$result = mysqli_query($con,$query) or die(mysqli_error($con));

while($row = mysqli_fetch_assoc($result)){
    $sup = $row['Supplier_id'];
    $com = $row['Company_name'];
    $phone = $row['Phone'];
    $address = $row['Address'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
</head>
<body>
    <div id="content">
        <div class="container">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Edit Supplier</h3>
                </div>
                <form action="edit_sup_firm.php" method ="POST">
                    <input type="hidden" name="Supplier_id" value="<?=$sup?>" required>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="comp">Company Name</label>
                            <input type="text" class ="form-control"name="Company_name" id= "comp"value="<?=$com?>" required>                        
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="text" class ="form-control" pattern = "[0-9]{3}[0-9]{4}[0-9]{3}" name="Phone" id ="phone" value="<?=$phone?>" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class ="form-control"name="address" id="address" value= "<?=$address?>" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type ="submit" class="btn btn-warning">Change</button>
                        <button type ="reset" class="btn btn-info">reset</button>
                        <a href ="supplier.php" class="btn btn-secondary">Cancel</a>
                    </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
if($_GET['action'] == "delete"){
	$query ="DELETE  FROM supplier WHERE Supplier_id  = '$_GET[id]'";
	$result = mysqli_query($con,$query);
	if(!$result){
		?>
		<script>
		alert("failed to delete supplier");
		window.location = "supplier.php";
		</script>
		<?php
}
else{
		?>
		<script>
		alert("Succesfully deleted supplier");
		window.location = "supplier.php";
		</script>
		<?php
}
}
?>