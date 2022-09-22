<?php
require 'connection.php';
require 'session.php';
confirm_logged_in();

unset($_SESSION['responce']);
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $totalpayment = $_POST['totalpayment'];
    $pid = $_POST['pid'];    
    $subtotal = $_POST['subtotal'];
    $cus = $_POST['customer'];
    $vat= $_POST['vat'];
    $product =$_POST['product'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $numofitems =  $_POST['numofitems'];
    $transcation_code = date("mdHis");
    $date =date('Y-m-j');
    
   
   
  foreach($product as $item =>$product){
      $query = "INSERT INTO transaction_detail(TRANS_D_ID,PRODUCT,PRICE,QTY,EMPLOYEE,ROLE) 
    VALUES ('$transcation_code' , '$product' , '$price[$item]' , '$qty[$item]' , ' $_SESSION[FIRST_NAME] $_SESSION[LAST_NAME]','$_SESSION[ROLE]')";
    $result = mysqli_query($con,$query) OR die(mysqli_error($con)) ;
    $query = "UPDATE inventory SET inHand_stock = inHand_stock - '$qty[$item]' WHERE product_id = '$pid[$item]' && NAME = '$product'";
    $result = mysqli_query($con,$query) OR die(mysqli_error($con)) ;
  }
  $query = "INSERT INTO transaction(customer, numofitems,subtotal, vat, grandtotal, date,TRANS_D_ID,branch_id) 
  VALUES ('$cus', '$numofitems','$subtotal', '$vat', '$totalpayment', ' $date','$transcation_code','$_SESSION[BRANCH]')";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
  if(!$result){
    mysqli_error($con);
  }
}
?>