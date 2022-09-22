<?php
require'connection.php';
include'sidebar.php';

 $query = 'SELECT *, customer, EMPLOYEE, ROLE
              FROM transaction T
              JOIN transaction_detail tt ON tt.TRANS_D_ID=T.TRANS_D_ID
              WHERE tran_id ='.$_GET['id'];
            
        $result = mysqli_query($con, $query) OR die(mysqli_error($con));
     
        while ($row = mysqli_fetch_assoc($result)) {
          $customer = $row['customer'];
          $date = $row['date'];
          $tid = $row['TRANS_D_ID'];
   
          $sub = $row['subtotal'];
          $vat = $row['vat'];
          $grand = $row['grandtotal'];
          $role = $row['EMPLOYEE'];
          $roles = $row['ROLE'];
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction Details</title>
  <style>
    @media print{
      @page {
        margin: 1in;
    }

      body * :not(#my-selection) :not(#my-selection *){
        visibility: hidden;
      }
      #my-selection , #my-selection *{
        visibility: visible;
      }
      
      #my-selection{
       position: fixed;
        left :0;
        top: 0;
        width: 100%;
        height: 200%;     
      }
      #non{
        visibility: hidden;
      }
    }
    
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
      <selection id="my-selection">
                <div class="card shadow mb-4">
                  <div class="card-header bg-primary text-white text-center">
                  <ul>
                    <li class="float-center">
                      <h3>Reciept</h3>

                    </li>
                    <li class="float-right">
                      <button class="btn btn-success" id ="non" onclick=  "window.print()">print</button>
                    </li>

                  </ul>  
                  </div>
                  <div class="card-body">
                       <div class=" form-group row text-left mb-0">
                
                <div class="col-sm-3 py-1">
                  <h6>
                    Date: <?php echo $date; ?>
                  </h6>
                </div>
              </div>
<hr>
              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1">
                  Customer name:
                  <h6 class="font-weight-bold">
                    <?php echo $customer; ?> 
                  </h6>
         
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h6>
                    Transaction #<?php echo $tid; ?>
                  </h6>
                  <h6 class="font-weight-bold">
                    Encoder: <?php echo $role; ?>
                  </h6>
                  <h6>
                    <?php echo $roles; ?>
                  </h6>
                </div>
              </div>
          <table class="table table-bordered" border = "2" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Products</th>
                <th width="8%">Qty</th>
                <th width="20%">Price</th>
                <th width="20%">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php  
           $query = 'SELECT *
                     FROM transaction_detail
                     WHERE TRANS_D_ID ='.$tid;
            $result = mysqli_query($con, $query) or die (mysqli_error($con));
            while ($row = mysqli_fetch_assoc($result)) {
              $Sub =  $row['QTY'] * $row['PRICE'];
                echo '<tr>';
                echo '<td>'. $row['PRODUCT'].'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $Sub.'</td>';
                echo '</tr> ';
              }
              ?>
            </tbody>
          </table>
          <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                
                  <table width="100%">
                    <tr>
                      <td class="font-weight-bold">Subtotal</td>
                      <td class="text-right">RS <?php echo $sub; ?></td>
                    </tr>
                    <tr>
                   
                    <tr>
                      <td class="font-weight-bold">VAT (13%)</td>
                      <td class="text-right">RS <?php echo $vat; ?></td>
                    </tr>
                    
                    <tr>
                      <td class="font-weight-bold">Total</td>
                      <td class="font-weight-bold text-right text-primary">RS <?php echo $grand; ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
            </div>
          </div>
      </selection>

            </div>
           
                    </div>
                  </div>
                </body>
                </html>