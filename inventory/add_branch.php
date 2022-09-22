<?php
require'connection.php';
require'session.php';
confirm_logged_in();

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['branch_name'];
        $location = $_POST['location'];
        
        $query = "INSERT INTO branch (branch_name, location) VALUES('$name'  ,'$location')";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
		?>
		<script>
    alert("Successfully inserted");
    window.location = "branch.php";
</script> 
<?php
}
else{
	?>
	<script>
	window.location = "branch.php";
		</script>
		<?php
	}
?>
