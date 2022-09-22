<?php
include'connection.php';
include'sidebar.php';
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supplier</title>
  <style>
    .card  ul{
overflow:hidden;
}
.card  li{
display:inline-block;
}
</style>
</head>
<body>
  
  <div id ="content">
    <div class = "container">
      
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <ul>
                      <li>
                        <h4 class="m-2 font-weight-bold text-primary">Suppliers</h4>
                      </li>
                      <li class="float-right">
                        <a  type = "button" class='btn btn-primary bg-gradient-primary'  href="addsup.php">Add supplier</a>
                      </li>
                    </ul>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered"width = "100%" id="dataTable"cellspacing="0" border = "2"> 
    <tr>
        <th>Supplier_id</th>
        <th>Compnay name</th>
        <th>Address</th>
        <th>Phone no</th>
        <th colspan ="2"> Action </th>
    </tr>
    <div>
<?php
$query = "SELECT Supplier_id, Company_name, Address, Phone FROM supplier";
$result= mysqli_query($con,$query) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)){
    echo '<tr>';
    echo '<td>'. $row['Supplier_id']. '</td>';
    echo '<td>'. $row['Company_name']. '</td>';
    echo '<td>'. $row['Address']. '</td>';
    echo '<td>'. $row['Phone']. '</td>';
    echo '<td><a  class="btn btn-primary bg-gradient-primary"  href ="editsup.php?action=edit&id='.$row['Supplier_id'].' ">Edit</td>';
    echo '<td><a  class="btn btn-danger bg-gradient-danger"  href ="editsup.php?action=delete&id='.$row['Supplier_id'].' ">Delete</td>';
    echo "</tr>";    
  }
  ?>
</table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        3