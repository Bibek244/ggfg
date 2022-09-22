<?php
    require'connection.php';
    require'topbar.php';
    if($_SESSION['TYPE'] != "admin"){
        $disable = "disabled";
    }
	else{
		$disable = '';
	}
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div id="content">
            <div class="container">

                <table class="table table-bordered">
                <thead>
        <tr>
            <th >Product code</th>
            <th >Name</th>
            <th >Quantity</th>
            <th >Available stock</th>
            <th >Cost Price</th>
            <th >Selling Price</th>
            <th >Category</th>
            <th >Date Stock In</th>
            <th colspan ="2"> ACTION</th>
</tr>
</thead>
<tbody>
                    <?php
				
    $pro_code  = $_GET['product_code'];
    $sql = "SELECT * FROM inventory WHERE product_code = '$pro_code'";
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
            echo '<td>'. $row['product_code']. '</td>';
            echo '<td>'. $row['NAME'] . '</td>';
            echo '<td>' .$row['QUANTITY'] . '</td>';
            echo '<td>' .$row['inHand_stock'] . '</td>';
            echo '<td>' . $row['cprice'] . '</td>';
            echo '<td>' . $row['sprice'] . '</td>';
            echo '<td>' . $row['CATAGORY'] . '</td>';
            echo '<td>' . $row['DATE'];
            echo "<td align = 'right'><a type= 'button' class='btn btn-primary bg-gradien $disable' href ='updateproduct.php?PRODUCT_ID=$row[PRODUCT_ID]&product_code=$row[product_code]&NAME=$row[NAME]&QUANTITY=$row[QUANTITY]&stock=$row[inHand_stock]&cprice=$row[cprice]&sprice=$row[sprice]&CATAGORY=$row[CATAGORY] '>Edit</a></td>";
            echo "<td align = 'right'> <a type= 'button' class='btn btn-danger bg-gradient-danger $disable' onclick ='return checkDelete()' href ='delete.php?PRODUCT_ID=$row[PRODUCT_ID]'>Delete</a></td> ";
            echo "</tr>";    
        }
    
    ?>
    </tbody>
</table>
</div>
</div>
<script>
    function checkDelete(){
        return confirm('Are you sure you want to delete this product from record');
    }
    </script>
    </body>
    </html>
 