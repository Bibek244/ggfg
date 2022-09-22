<?php
require'connection.php';
require'session.php';
confirm_logged_in();

$pid = $_GET["PRODUCT_ID"];
$query = "DELETE FROM inventory WHERE PRODUCT_ID ='$pid'";
$result = mysqli_query($con,$query);
if(!$result){

    ?>
    <script>alert('Failed to delete product');
    window.location ='inventory.php';
</script>
    <?php
}
else{
    ?>
    <script>alert('The product has been deleted');
    window.location ='inventory.php';
</script>
    <?php
}
?>