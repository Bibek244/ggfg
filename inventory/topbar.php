<?php
require'session.php';
confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link  href="css/bootstrap.min.css" rel="stylesheet" >
  <script src="js/bootstrap.min.js" ></script>
<style>
  .topbar .topbar-divider {
  width: 0;
  border-right: 1px solid #e3e6f0;
  height: calc(4.375rem - 2rem);
  margin: auto 1rem;
}
</style>
</head>

<body>
<nav class="navbar-custom navbar-expand-lg navbar-light bg-white  topbar static-top py-2 shadow mb-3">
      <div class="container-fluid">
    
    
      
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <a class="navbar-brand" href="welcome.php">Inventory Management System</a>
      <ul class="navbar-nav ml-auto ">
        <?php
        if($_SESSION['TYPE'] !="admin"){?>
          <h2 class="nav-link navbar-brand" ><?=$_SESSION['B_NAME'] ?> Branch</h2>
        <?php
        }
        if($_SESSION['ROLE'] != "Cashier"){
          if($_SESSION['ROLE']  == "Branch Manager"){
          ?>
          <li class="nav-item">
            <a class="nav-link navbar-brand" href="brn_inventory.php">Inventory</a>
          </li>
          <?php
        }
        ?>
      <li class="nav-item">
          <a class="nav-link navbar-brand" href="product.php">Add Product</a>
        </li>
        <?php
      }
      ?>
        <li class="nav-item">
          <a class="nav-link navbar-brand" href="sales.php">Sales</a>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown">      
          <a class="nav-link dropdown-toggle navbar-brand" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?=$_SESSION['FIRST_NAME'] ." " . $_SESSION['LAST_NAME']?>
            <img class="img-profile rounded-circle" width="40px" height="40px"
                <?php
                  if($_SESSION['GENDER']=='Male'){
                    echo 'src="icon/male.jpg"';
                  }else{
                    echo 'src="icon/female.jpg"';
                  }
                ?>>

              </a>

              <?php 

                $query = 'SELECT ID, fname,lname,username,password
                          FROM login l
                          JOIN employee e ON e.Employe_Id=l.Employe_Id';
                $result = mysqli_query($con, $query) or die (mysqli_error($con));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $a = $_SESSION['Member_ID'];
                }
                          
            ?>
          </a>
       
          <ul class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
        
            <li><a class = "dropdown-item " href="acc_edit.php"> Profile </a></li>
          <li><a class = "dropdown-item" href = "setting.php">Setting</a></li>
          <div class="dropdown-divider"></div>
          <li><button class = "dropdown-item" onclick= "return logout()">Log out</button></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
<script>
function  logout(){
  if(confirm("Are you sure you want to logout") == true) {
    window.location = "logout.php";
  }
}
</script>