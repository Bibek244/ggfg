<?php
require'connection.php'; 
$id = $_POST['branch_id'];

    $query = "SELECT PRODUCT_ID,NAME,sprice ,branch_id FROM inventory WHERE branch_id = '$id'";
    

$result = mysqli_query($con,$query) or die(mysqli_error($con));
$branch = "<select name = 'product' id='product' class='form-control'> ";
     $branch .=  "<option select ='selected'>Select Product</option>";
            
while($row = mysqli_fetch_assoc($result)){
    $branch .="<option  id = ".$row['PRODUCT_ID']." value =".$row['NAME'].">".$row['NAME']."</option>";;
?>
<?php
}
$branch .= "</select>";
echo $branch;
?>
