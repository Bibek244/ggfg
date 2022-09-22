<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
require'connection.php';
include"sidebar.php";
include'function.php';
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
    <div id = "content">
  
        <div class="container">
        <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Select Inventory</h3>
                </div>
                <form  method ="GET">
                <div class="card-body">
                    <div class="form-group">
                        <label for="branch_name">Branch Name</label>
                        <?=$branch?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" >
                    </div>
                    </div>
                    <div class="card-footer text-right">
                    <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" name ="reset" class="btn btn-secondary">ALL</button>
                    </div>
                </form>
            </div>
</div>
  
<div class="container">

    <div class="card  mb-4 shadow ">
        <div class="card-header py-3 border-danger">
            <h4 class="m-2 font-weight-bold text-primary">
                <ul>
                <li>
                    Inventory
                </li>
                            <li class="float-right" >         
                                <a type ="button" class="btn btn-primary bg-gradient-primary " href = "product.php">Add product</a>
                            </li>
                </ul>
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
</thead>
<tbody>
    <?php
    if(isset($_GET['submit']) && !isset($_GET['unset'])){
        
        $sql = "SELECT PRODUCT_ID, product_code, NAME, QUANTITY, cprice, sprice, CATAGORY, DATE , b.branch_name FROM inventory i 
        join branch b ON b.branch_id = i.branch_id
         WHERE i.branch_id ='$_GET[branch]' GROUP BY PRODUCT_CODE";
        $result = mysqli_query($con,$sql) or die (mysqli_error($con));
        echo"List of product in ";
        
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
        echo $_SESSION['branch_name'] ." branch";
    }
    else{  
        echo"List of product in all inventory";
        $sql = "SELECT PRODUCT_ID,product_code, NAME, QUANTITY, cprice, sprice, CATAGORY, DATE,branch_name FROM inventory i
        JOIN branch b ON b.branch_id = i.branch_id 
        GROUP BY PRODUCT_CODE ORDER BY i.branch_id";
        $result = mysqli_query($con,$sql) or die (mysqli_error($con));
    }
        while($row = mysqli_fetch_assoc($result)) {
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
    </tbody>
</table>
</div>

</div>
</div>

</div>
</div>
            </body>
            </html>