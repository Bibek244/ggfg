<?php
require'connection.php';
include'sidebar.php';

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
   .container  ul {
      overflow:hidden;
    }
   .container  li{
      display: inline-block;
    }
  </style>
</head>
<body>
  
  
  <div id = "content">
    <div class="container">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Transaction</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered"width = "100%" id="dataTable"cellspacing="0" border = "2"> 
               <thead>
                   <tr>
                     <th width ="1%">SN</th>
                     <th width="19%">Transaction Number</th>
                     <th>Customer</th>
                     <th width="13%"># of Items</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>

            <?php                  
    $query = 'SELECT *
              FROM transaction ';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));
        $result_all = mysqli_num_rows($result);
        if($result_all == 0){
          echo"<tr><td colspan ='5' align ='center'>No records found!!!</td></tr>";
          exit;
        }
        $limit = 10;
        if(isset($_GET['limit'])){
          $limit =  $_GET['limit'];
        }
        $page = 1;
        if(isset($_GET['page'])){
          $page =  $_GET['page'];
        }
        
        $start =($page - 1) * $limit;

        $query_limit = "SELECT * FROM transaction ORDER BY TRANS_D_ID ASC LIMIT $start,$limit";
        $result_limit =mysqli_query($con,$query_limit);


        $i = $start +1;
        ?>
        <ul>
        <li  class ="float-left">
      <?php
        $total_page =  ceil($result_all / $limit);
        echo "Total Page :".$page .'/'. $total_page;
        $pagination = "<nav>
        <ul class='pagination'>";
        if($result_all>$limit){
          $disabled = ($page==1 ) ? "disabled" : "";
          $pagination .="<li class= 'page-item $disabled'>
          <a class='page-link' href='?page=1'>First</a></li> ";
          $prev = $page - 1;
          $pagination .="<li class= 'page-item $disabled'>
          <a class='page-link' href='?page=$prev'>prev</a></li> ";
          $disabled = ($page==$total_page ) ? "disabled" : "";
           $next = $page + 1;
          $pagination .="<li class= 'page-item $disabled'>
          <a class='page-link' href='?page=$next'>Next</a></li> ";
          $pagination .="<li class= 'page-item $disabled'>
          <a class='page-link' href='?page=$total_page'>Last</a></li> ";
        }
        $pagination .="</ul></nav>";
        echo $pagination;

    ?>
    </li>
    <li class ="float-right">
    <label for="limit">Table size</label>
    <ul id ="limit"class="pagination ">
      <li class ="page-item">
        <a class= "page-link"href ="?limit=10">10</a>  
      </li>
      <li class ="page-item">
        <a class= "page-link" href ="?limit=25">25</a>  
      </li>
      <li class ="page-item">
        <a class= "page-link" href ="?limit=50">50</a>  
  </li>
  <li class ="page-item">
    <a class= "page-link" href ="?limit=100">100</a>  
  </li>
  
</ul>
      </li>
</ul>
<?php
        while ($row = mysqli_fetch_assoc($result_limit)) {
          echo '<tr>';
          echo'<td>'.$i.'</td>';
          echo '<td>'. $row['TRANS_D_ID'].'</td>';
          echo '<td>'. $row['customer'].'</td>';
          echo '<td>'. $row['numofitems'].'</td>';
          echo '<td align= "right">
          <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['tran_id'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
          </div> </td>';
          echo '</tr> ';
          $i++;
        }
    
        ?> 
                                    
                                </tbody>
                            </table>
                            

                             
                     
                    
                  </div>
                  </div>
                </div>
              </div>
              
              </body>
            </html>
                