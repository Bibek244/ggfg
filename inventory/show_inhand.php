<?php
require'connection.php'; 
$id = $_POST['id'];
$query = "SELECT PRODUCT_ID,NAME,inHand_stock FROM inventory WHERE PRODUCT_ID = '$id'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)){
?>
<?= $row['inHand_stock']?>
<?php
}
?>
