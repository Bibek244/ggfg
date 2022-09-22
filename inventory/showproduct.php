<?php
require'connection.php'; 
$id = $_POST['id'];
$query = "SELECT PRODUCT_ID,NAME,sprice FROM inventory WHERE PRODUCT_ID = '$id'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)){
?>
<?= $row['sprice']?>
<?php
}
?>
