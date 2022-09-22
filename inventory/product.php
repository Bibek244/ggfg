<?php
    include "connection.php";
        include 'topbar.php';
        include'function.php';
        confirm_logged_in();
		 if($_SESSION['ROLE']  == "Cashier"){
		 ?>
		 <script>
		 alert("your are not authorize to access this page \nredirecting you to sales");
		 
		 window.location = "sales.php";
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
    <title>Add product</title>

    
</head>
<body>
    
    <div id="content">
        <div class="container " >
    

                <div class="card  shadow" >
                    
                <div class="card-header bg-primary  ">
               <h3 class="m2 font-weight-bold text-white card-text text-center">Insert Product</h3> 
            </div>
            <div class=" card-body ">
                <form method = "post" action = "add_product.php">

                    <div class = "form-group">  
                        <label for="name">Product Name</label>  
                        <input type="text" name="Name" id ="name" class="form-control" placeholder="Product name" required>
                        </div>
                        <div class = "form-group">    
                            <label for="PC">Product Code</label>
                        <input type="text" name="product_code"  id = "PC" class="form-control" placeholder="product_code" required>
                        </div>
                        <div class = "form-group">    
                            <label for="qty">Quantity</label>
                            <input type="num" min='1' name="QUANTITY" id ="qty" class="form-control" placeholder="Quantity" required>
                        </div>
                        <div class = "form-group">    
                            <label for="cprice">Cost Price</label>
                            <input type="number" min="1"  name="cprice" id ="cprice" class="form-control" placeholder="Cost price" required>
                        </div>
                        <div class = "form-group">    
                            <label for="sprice">Selling Price</label>
                            <input type="number" min="1"  name="sprice" id= "sprice"  class="form-control" placeholder="Selling price" required>
                        </div>
                        <div class = "form-group">    
                            <label for="catagory">Catagory</label>
                            <input type="text" name="CATAGORY" id ="catagory"  class="form-control" placeholder="Catagory" required>
                        </div>
                        <div class = "form-group">   
                            <label for="supplier">Supplier</label> 
                            <?=$supplier?>
                        </div>    
                        <?php if($_SESSION['ROLE'] !="Branch Manager"){
                                ?>
                            <div class = "form-group">    
                                <label for="branch">Branch</label>
                            <?=$branch?>
                            </div>  
                            <?php   
                        }?>
</div>
        <div class="card-footer">
            <button type ="submit" name ="submit" class= "btn btn-primary bg-gradient-primary">ADD</button>
            <button type ="reset" class= "btn btn-warning bg-gradient-warning">Reset</button>
        </div>
    </form>
</div>
</div>
                    </div>
                    
                
            </body>
            </html>