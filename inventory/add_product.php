<?php
    require "connection.php";
    require'session.php';
    confirm_logged_in();
    if(isset($_POST['submit'])){
        $name = $_POST['Name'];
        $code = $_POST['product_code'];
        $QUANTITY = $_POST['QUANTITY'];
        $cprice= $_POST['cprice'];
        $sprice= $_POST['sprice'];
        $CATAGORY = $_POST['CATAGORY'];
        $supplier = $_POST['Supplier'];
        if($_SESSION['ROLE'] != "Branch Manager"){
        $branch = $_POST['branch'];
        $query = "INSERT INTO inventory (product_code, NAME, QUANTITY, cprice,sprice, CATAGORY, Supplier_id, DATE, branch_id, inHand_stock) 
                            VALUES ('$code-$branch ', '$name', '$QUANTITY', '$cprice', '$sprice','$CATAGORY', '$supplier', current_timestamp(), '$branch','$QUANTITY')";
        }
        else{
        $query = "INSERT INTO inventory (product_code, NAME, QUANTITY, cprice,sprice, CATAGORY, Supplier_id, DATE, branch_id, inHand_stock)
                        VALUES ('$code-$_SESSION[BRANCH]', '$name', '$QUANTITY', '$cprice', '$sprice','$CATAGORY', '$supplier', current_timestamp(), '$_SESSION[BRANCH]','$QUANTITY')";
    }
    
        $result = mysqli_query($con,$query);
        if((!$result)){
            ?>
            <script type = "text/javascript">
                alert(`<?php echo mysqli_error($con)?>`);
                window.location = "product.php";
        </script>
        <?php    
    }
        else{
            ?>
            <script type = "text/javascript">
                alert("Successfully inserted item into inventory");
                window.location = "product.php";
        </script>
        <?php
        }
    }
	else{
	?>
	<script>
	window.location = "inventory.php";
		</script>
		<?php
	}
    ?>