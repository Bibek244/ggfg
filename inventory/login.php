<?php require('session.php');?>
<?php if(logged_in()){ ?>
          <script type="text/javascript">
            window.location = "welcome.php";
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
  <title> Login page </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
  
  
  <div class="container">
    <div class="card shadow m-5 p-5">
    <div class="car-header text-center bg-primary text-white">
      <img class = "img-profile rounded-circle center m-2" width="100px" height="100px" src ="icon/male.jpg" alt="icon" >
      <h2>Inventory Management System</h2>
    </div>
      <form  method ="post" action ="process_login.php">
        <div class="m-3 text-center">

          <input type="text" class="form-control shadow-none text-center border-top-0 border-left-0 border-right-0 rounded-0" id="username" name = "username" placeholder ="Username"  required>
        </div>
          <div class="m-3 text-center">
        
            <input type="password" class="form-control shadow-none text-center border-top-0 border-left-0 border-right-0 rounded-0" id="password" name = "password"  placeholder="Password" required>
          </div>
        
      <div class="m-3 text-center">

        <button type="submit" class="btn btn-primary  ">Login</button>
      </div>
        
      </form>
    </div>
  </body>
  </html>
  
