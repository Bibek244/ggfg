<?php
   include 'connection.php';
require'session.php';
confirm_logged_in();
if($_SESSION['TYPE'] != "admin"  ){
  ?>
  <script>
    alert("your are not authroized to access this page.\nYour are redirected to sales");
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

  <style>
    *{
          margin : 0;
          padding : 0;
          box-sizing : border-box;
          font-family : san-sarif;
          text-decoration: none ;
          
          list-style: none;
    }
   #content {
    box-sizing: border-box;
    margin-left : 270px;
   }
    .sidebar{
      position : fixed;
      left : 0;
      width : 250px;
      height : 100%; 
      background : #2C3A47;
    }
   .sidebar header{
      font-size: 22px;
      text-align: center;
      line-height: 66px;
      background: #32485e ;
      user-select: none;
      color: white;        
    }
.sidebar  ul a{
  text-decoration: none;
  display : block;
  width : 100%;
  height : 100%;
  line-height: 60px;
  padding-left: 40px;
  font-size : 20px;
  color: white;        
  box-sizing:border-box;
  border-top: 1px solid #97afc7;
  border-bottom: 1px solid black;
  transition: .4s;
}

.sidebar > ul li:hover a{
  padding-left:50px;
}
.navbar-custom{
   
  vertical-align: bottom;

  border-bottom: 1px solid white;
}
.topbar .topbar-divider {
  width: 0;
  border-right: 1px solid #e3e6f0;
  height: calc(4.375rem - 2rem);
  margin: auto 1rem;
}

    </style>

    <link  href="css/bootstrap.min.css" rel="stylesheet" >
  <script src="js/bootstrap.min.js" ></script>
<body>
  <div class="man_box">
    <div class="sidebar  " id = "sidebar">
    <a href ="welcome.php"><header>Inventory  System</header></a>
      <ul>
        <li><a href ="inventory.php">Inventory</a></li>

        <li><a href ="branch.php">Branch</a></li>
        <li><a href ="employee.php"> Employee</a></li>
          <li><a href =" transaction.php">Transaction</a></li>
          <li><a href ="supplier.php">Supplier</a></li>  
          <li><a  href ="account.php">Accounts</a></li>
          
      </ul>
        </div>
        </div>
      </div>
    
      <div id="topbar">
      <nav class="navbar-custom navbar-expand-lg navbar-light bg-white  topbar static-top py-2 shadow mb-3">
      <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto ">
      <li class="nav-item">
          <a class="nav-link navbar-brand" href="product.php">Add Product</a>
        </li>
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
          <li><Button class = "dropdown-item" onclick ="return logout()" >Log out</button></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
</body>
</html>
<script>
function  logout(){
  if(confirm("Are you sure you want to logout") == true) {
    window.location = "logout.php";
  }

}
</script>