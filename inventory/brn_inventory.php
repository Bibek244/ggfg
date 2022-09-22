<?php
include"connection.php";
include"topbar.php";
if($_SESSION['ROLE'] !="Branch Manager"){
    ?>
    <script>
        alert("This page is only accessable to Branch Manager");
        window.location ="sales.php";
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
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
<div class="container">

    <div class="card  mb-4 shadow ">
        <div class="card-header py-3 border-danger">
            <h4 class="m-2 font-weight-bold text-primary">
                    Inventory
            </h4>
             
            </div>
         
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"width = "100%" id="dataTable"cellspacing="0" border = "2"> 
                    
                        <thead>
        <tr>
            <th>Branch</th>
            <th >Product code</th>
            <th >Name</th>
            <th >Quantity</th>
            <th >Cost Price</th>
            <th >Selling Price</th>
            <th >Category</th>
            <th >Date Stock In</th>
            <th  align="center">Action</th>
</tr>
<?php
$sql = "SELECT PRODUCT_ID, product_code, NAME, QUANTITY, cprice, sprice, CATAGORY, DATE , b.branch_name FROM inventory i 
        join branch b ON b.branch_id = i.branch_id
         WHERE i.branch_id ='$_SESSION[BRANCH]' GROUP BY PRODUCT_CODE ";
        $result = mysqli_query($con,$sql) or die (mysqli_error($con));
        
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['branch_name'] = $row['branch_name'];
            echo '<tr>';
            echo '<td>'. $row['branch_name']. '</td>';
            echo '<td>'. $row['product_code']. '</td>';
            echo '<td>'. $row['NAME'] . '</td>';
            echo '<td>' .$row['QUANTITY'] . '</td>';
            echo '<td>' . $row['cprice'] . '</td>';
            echo '<td>' . $row['sprice'] . '</td>';
            echo '<td>' . $row['CATAGORY'] . '</td>';
            echo '<td>' . $row['DATE'];
            
            echo "<td align = 'right'> <a type= 'button' class='btn btn-secondary bg-gradient' href ='detail_product.php?product_code=$row[product_code]'>Detail</a></td> ";
        
            echo "</tr>";    
        }
        ?>
</thead>
<tbody>
