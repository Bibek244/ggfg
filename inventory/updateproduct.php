<?php
include'connection.php';
include'sidebar.php';
ini_set("display_errors", "1");
error_reporting(E_ALL);
$PRODUCT_ID = $_GET['PRODUCT_ID'];
$product_code = $_GET['product_code'];
$name = $_GET['NAME'];
$quantity = $_GET['QUANTITY'];
$inHand_stock =$_GET['stock'];
$cprice = $_GET['cprice'];
$sprice = $_GET['sprice'];
$catagory = $_GET['CATAGORY'];

if($PRODUCT_ID == NULL){
        header("location: inventory.php");
}
?>
<div id="content">
<div class="container">
        <div class ="card shadow">
                <form method = "post" >
                <div class="card-header bg-primary text-white">
                       <h3> Edit Product</h3>
                </div>

                <div class="card-body">
                        <div class="form-group">
                        <label for ="Name">Product Name</label>
                                <input type="text" class="form-control"name = "Name" id ="Name" value ="<?php echo $name?>">
                        </div>
                        <div class="form-group">
                        <label for ="code">Product code</label>
                                <input type="text" class="form-control"name = "product_code" id ="code" value ="<?php echo $product_code?>">
                        </div>
                        <div class="form-group">
                        <label for ="QUANTITY">Quantity</label>
                                <input type="number" class = "form-control"name ="QUANTITY" id ="QUANTITY" value =<?php echo $quantity?>>
                        </div>  
                        <div class="form-group">
                        <label for ="stock">Available stock</label>
                                <input type="number" class = "form-control"name ="inHand_stock" id ="stock" value =<?php echo $inHand_stock?>>
                        </div>

                        <div class="form-group">
                        <label for ="cprice">Cost price</label>
                                <input type="number" class="form-control" name ="cprice" id ="cprice" value ="<?php echo $cprice?>">
                        </div>
                        <div class="form-group">
                                <label for ="sprice">Selling Price</label>
                                <input type="number" class ="form-control" name ="sprice" id ="sprice" value ="<?php echo $sprice?>">
                        </div>
                        <div class="form-group">
                                <label for ="CATAGORY">CATAGORY</label>
                                <input type="text" class= "form-control" name = "CATAGORY" id ="CATAGORY" value ="<?php echo $catagory?>">
                        </div>                        
                </div>
                <div class="card-footer">
                        <button type ="submit" class="btn btn-warning btn-gradient-warning"> submit</button>
                
                </form>
                <a href="inventory.php" class="btn btn-secondary btn-gradient-secondary"> Cancel</a>
                </div>
        </div>

</div>
</div>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
$NAME = $_POST['Name'];
$code = $_POST['product_code'];
$QUANTITY = $_POST['QUANTITY'];
$cprice = $_POST['cprice'];
$sprice = $_POST['sprice'];
$CATAGORY= $_POST['CATAGORY'];
$query =  "UPDATE inventory  set NAME = '$NAME', product_code ='$code', QUANTITY = '$QUANTITY',cprice = '$cprice', sprice = '$sprice', CATAGORY = '$CATAGORY'  WHERE  PRODUCT_ID =$PRODUCT_ID";
$result = mysqli_query($con,$query);
if(!$result){
        echo "error".mysqli_error($con);
}
else{
        ?>
        <script>
                alert("success");
                window.location = "inventory.php";
                </script>
                
                <?php
}
}
?>