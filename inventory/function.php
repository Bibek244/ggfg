<?php
// for Brance select option box
$branch = "<select name = 'branch' id='branch' class='form-control'> 
<option>Select Branch</option>";
$query = "SELECT * FROM branch";

$result = mysqli_query($con,$query) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)){
    $branch .="<option  id = ".$row['branch_id']." value =".$row['branch_id'].">".$row['branch_name']."</option>";
}
$branch .="</select>";
// for Supplier select option box
$query = "SELECT Supplier_id, Company_name FROM supplier";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$supplier = "<select name = 'Supplier' id='supplier'  class='form-control'>
<option  disabled> Select supplier</option>";
while($row = mysqli_fetch_assoc($result)){
    $supplier .="<option  id = ".$row['Supplier_id']." value =".$row['Supplier_id'].">".$row['Company_name']."</option>";
}
$supplier .= "</select>";
?>