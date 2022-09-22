<?php
require'connection.php';
require'session.php';
confirm_logged_in();
if($_SERVER['REQUEST_METHOD']=="POST"){
    $supplier_id = $_POST['Supplier_id'];
    $Company_name = $_POST['Company_name'];
    $phone = $_POST['Phone'];
    $address = $_POST['address'];

    $query = "UPDATE supplier SET Company_name = '$Company_name',Phone = '$phone', Address ='$address' WHERE Supplier_id = '$supplier_id'";
    $result = mysqli_query($con,$query);
    if(!$result){
        ?>
        <script>
            alert('failed');
            window.location = "supplier.php"
            </script>
            <?php
    }
    else{
        ?>
        <script>
            alert('Success');
            window.location = "supplier.php";
    </script>
    <?php
    }
}
?>