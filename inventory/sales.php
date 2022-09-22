<?php
require 'connection.php'; 
include'function.php';
include'topbar.php';
if($_SESSION['TYPE']!="admin"){
   $query = "SELECT PRODUCT_ID,NAME FROM inventory WHERE branch_id = '$_SESSION[BRANCH]'";
   $result = mysqli_query($con,$query) or die(mysqli_error($con));
   $product = "<select id = 'product' class= 'form-control' >
   <option> Select Product</option>";
   while($row = mysqli_fetch_assoc($result)){
      $product .="<option  id = ".$row['PRODUCT_ID']." value =".$row['NAME'].">".$row['NAME']."</option>";
   }
   $product .= "</select>";
}
else{
   $product="<select id ='product' class='form-control'>
      <option> Select product</option>
   </select>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALES</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
       .hiddenfield {
  opacity: 0;
  width: 0;
  float: left; /* Reposition so the validation message shows over the label */
}
.container1{
   position: absolute;
 box-sizing: border-box;
 display: flex;
 justify-content: center;
   width : calc(100% - 300px);
   
  z-index :2;
}
.container{
   box-sizing: border-box;
   z-index :1;
}
    </style>
</head>
<body> 
   <div id="content" >
<div class="container">
   <div class = "container1">
         <div role="alert" id="errorMsg" class="mt-5 text-center " >
            <!-- Error msg  --> 
</div>
      </div>
      <div class="card mb-3 shadow">
<div class="card-header text-white bg-primary">
<h3> Sales Detail</h3>
</div>
<div class="card-body ">

   <div class="table-responsive">
      <table class="table table-bordered"width = "100%" id="dataTable"cellspacing="0" border = "2"> 
         <tr>
            <td><label for = "customer">Customer</label></td>
            <?php 
           if($_SESSION['TYPE'] !="user"){
              ?>
            <td><label for ="branch">Branch</label></td>
   <?php
            }?>
            <td><label for ="product">Product</label></td>
         <td><label for = "qty">Quantity</label> </td>
         <td>Price</td>
         <td>In stock</td>
      </tr>
      <tr>
         <td><input type ="text"id ="customer" class = "form-control"name = "customer" placeholder="customer name"></td>   
         <?php
         if($_SESSION['TYPE'] !="user"){
            ?>
            <td><?= $branch?></td>
      <?php   
      }?>
      <td id ="prod"><?= $product?></td>
         <td> <input type = "number" class = "form-control" min ="1" max ="9999999" id = "qty" ></td>
         <td id = "price"></td>
         <td id ="stock"></td>
      </tr>
   </table>
   
</div>
</div>
<div class="card-footer">
   
   <button id = "add" class = "btn btn-primary btn-grident-primary" > Add </button>
</div>
</div>
<div class="card mb-3 shadow">
   <div class="card-header bg-primary text-white">
      <h3>Bill / Receipt</h3>
   </div>
   <div class="card-body">
   <div class = "table-responsive">
   <table id="receipt_bill" class="table table-bordered" cellspacing="0"  border="2">
      <thead>
         <tr>
            <th> No.</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th class="text-center">Price</th>
            <th class="text-center">Total</th>
         </tr>
      </thead>
      <tbody id="new" >
         
         </tbody>
         
         <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            
            <td class="text-right text-dark" >
               <h5><strong>Sub Total:  RS </strong></h5>
               <p><strong>Tax (13%) : RS </strong></p>
            </td>
            <td class="text-center text-dark" >
               <h5> <strong><span id="subTotal"></strong></h5>
               <h5> <strong><span id="taxAmount"></strong></h5>
            </td>
         </tr>
         <tr >
            <td> </td>
            <td> </td>
            <td> </td>
            <td class="text-right text-dark">
               <h5><strong>Gross Total: RS</strong></h5>
            </td>
            <td class="text-center text-danger">
               <h5 id="totalPayment"><strong> </strong></h5>
            </td>
         </tr>
      </table>
   </div>
      
      
      <form id ="form" method = "POST" onsubmit="save()">
         <input type="text" id ="totalpay" oninvalid="this.setCustomValidity('Please add a product before submitting')"name="totalpayment"required class="hiddenfield" >
         <input type="hidden" id ="cus"  name="customer" required>
         <input type="hidden" id="sub" name="subtotal"  required>
         <input type="hidden" id="vat"  name="vat" required>
         
         <div id = "newitem">
            
            </div>
         </div>
                     <div class="card-footer">

                        <input type = "submit" class ="btn btn-success btn-gradient-success" value ="Submit">    
                        <button type ="reset"  class = "btn btn-secondary btn-gradient-secondary"onclick="clicked()">Reset</button>  
                     </div>
                     </form>
            </div>
         </div>
      </div>
               
                        <script>
       //passing the variable to html from for php
      var pro = [];
      var qtyno = [];
      var prices = [];
      var pid =[];
      var id;
      var branch_id ;
      var checkbranch ;
      $('#branch').change(function(){
       branch_id =$(this).val();
         $.ajax({
            url:"show_branch.php",
            method:"POST",
            data:{
               branch_id : branch_id
            },
            success:function(data){
               $('#product').html(data);
            },
         });
      });
 $('#product',('#prod'),).change(function() {
    id = $(this).find(':selected')[0].id;
       $.ajax ({
          url:"showsales.php",
          method:"POST",
         data:{
            id  :  id 
         }, 
         success:function(data){
            $("#price").html(data);
         }
       })
       $.ajax ({
          url:"show_inhand.php",
          method:"POST",
         data:{
            id  :  id 
         }, 
         success:function(data){
            $("#stock").html(data);
         }
       })
    });
  
//Add to cart
var count = 1;
$('#add').on('click',function(){
  var name = $('#product').val();
  var qty = $('#qty').val();
  var price =$('#price').text();
  var cus = $('#customer').val();
  var stock = parseInt($('#stock').text());
  var check = $('#branch').val();

  var nameRegex = /^[a-zA-Z/\s/ \-]+$/;
  var validfirstUsername = cus.match(nameRegex);


               if(count >= 2 &&  check != checkbranch ){
                  var erroMsg =  '<span class="alert alert-danger ml-5"> Cannot add different branch tarnsaction in same bill. Please do the transaction in seperate bill</span>';
                  $('#errorMsg').html(erroMsg).stop(true, true).show().fadeOut(9000);
            }
            else{
               if(pro.indexOf(name) !== -1){
                  var erroMsg =  '<span class="alert alert-danger ml-5">Item already exist in cart to add please press reset and select desired quantity</span>';
                  $('#errorMsg').html(erroMsg).stop(true, true).show().fadeOut(9000);
            }
            else{
   if (validfirstUsername == null){
      var erroMsg =  `<span class="alert alert-danger ml-5">Customer name is not valid. Only characters A-Z, a-z and '-' are  acceptable.</span>`;

      $('#errorMsg').html(erroMsg).stop(true, true).show().fadeOut(9000);
      return false;
   }
   else{
      if(price ==''){
   var erroMsg =  '<span class="alert alert-danger ml-5">price cannot be null please select a product </span>';
      $('#errorMsg').html(erroMsg).stop(true, true).show().fadeOut(9000);
  }
  else{
      if (qty == ''|| qty < 1){
         var erroMsg =  '<span class="alert alert-danger ml-5">Minimum Qty should be 1 or More than 1</span>';
         $('#errorMsg').html(erroMsg).stop(true, true).show().fadeOut(9000);
      }
      else{
         if (stock == '0'|| stock < qty){
            var erroMsg =  '<span class="alert alert-danger ml-5">Product is out of stock</span>';
            $('#errorMsg').html(erroMsg).stop(true, true).show().fadeOut(9000);
         }
         else{
            pro.push(name);
            qtyno.push(qty);
            prices.push(price);   
            pid.push(id);
            checkbranch = check;
            //product();
            billFunction();
      }
   }
  }
}
}
}
  function billFunction()
          {
            var total = 0;   
          $("#receipt_bill").each(function () {
            
          var total =  price*qty;
          var subTotal = 0;
          subTotal += parseInt(total);
       
         
  
          
          var table =   '<tr><td>'+ count +'</td><td>'+ name + '</td><td>' + qty + '</td><td>' + price + '</td><td><strong><input type="hidden" id="total" value="'+total+'">' +total+ '</strong></td></tr>';
          $('#new').append(table)
 
           
            var total = 0;
            $('tbody tr td:last-child').each(function() {
                var value = parseInt($('#total', this).val());
                if (!isNaN(value)) {
                    total += value;
                }
            });
             $('#subTotal').text(total);
               
   
              var Tax = (total * 13) / 100;
              $('#taxAmount').text(Tax.toFixed(2));
 
             // Code for Total Payment Amount
 
             var Subtotal = $('#subTotal').text();
             var taxAmount = $('#taxAmount').text();

             var totalPayment = parseFloat(Subtotal) + parseFloat(taxAmount);
             $('#totalPayment').text(totalPayment.toFixed(2)); 
             // code for form 
             document.getElementById("totalpay").value = totalPayment;
             document.getElementById("cus").value =  document.getElementById("customer").value
             document.getElementById("sub").value = Subtotal;
             document.getElementById("vat").value = taxAmount;
            });      
         count++;
        } 
       });
      
       
       function clicked(){
         document.getElementById("new").innerHTML =null; 
      count= 1;
      pro = [];
      qty = [];
      prices =[];
      pid =[];
      return;
       }
       
      function save(){
         var form = document.getElementById("form"),
      data = new FormData(form);
     data.append("numofitems",count-1);
 for(i = 0; i< pro.length; i++){
    data.append("product[]", pro[i]);
    data.append("qty[]",qtyno[i]);
    data.append("price[]",prices[i]);
    data.append("pid[]",pid[i]);
   }

      
              fetch("add_sale.php", { method:"POST", body:data })
  .then(res=>{
      if (res){
         
         alert('Success!!!');
      }
      else{

         alert('error occured');
      }
   }

  ).then((response) => {
    console.log(response);
  });
  return false;
      } 

 </script>
</html>