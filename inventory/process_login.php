<?php
require'connection.php';
require'session.php';
ini_set("display_errors", "1");
error_reporting(E_ALL);

        if($_SERVER["REQUEST_METHOD"]== "POST"){
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $sql = 'SELECT id,username,fname,lname,TYPE,e.Employe_Id
    FROM login l
    join employee e ON e.Employe_Id =  l.Employe_Id
    join type t ON t.TYPE_ID = l.TYPE_ID
    WHERE l.TYPE_ID = 2';
    $query = "SELECT l.id,l.username, e.fname, e.lname, TYPE, e.Employe_Id, e.gender, e.branch_id, j.JOB_TITLE
    FROM login l
    join employee e ON e.Employe_Id =  l.Employe_Id
    join job j ON j.JOB_ID = e.JOB_ID
    join type t ON t.TYPE_ID = l.TYPE_ID
    WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($con,$query);
    $count = mysqli_num_rows($result);
    if($count > 0){
        $matcheduser = mysqli_fetch_assoc($result);
      $_SESSION['Member_ID'] = $matcheduser['id'];
      $_SESSION['EMP_ID'] = $matcheduser['Employe_Id'];
      $_SESSION['TYPE'] = $matcheduser['TYPE'];
      $_SESSION['ROLE']  =$matcheduser['JOB_TITLE'];
      $_SESSION['GENDER']  =$matcheduser['gender'];
      $_SESSION['FIRST_NAME'] = $matcheduser['fname'];
      $_SESSION['LAST_NAME'] = $matcheduser['lname'];
      $_SESSION['USERNAME'] = $matcheduser['username'];
      $_SESSION['BRANCH'] = $matcheduser['branch_id'];
    
      if ($_SESSION['TYPE']=='admin'){
      ?>
    <script type="text/javascript">
    //then it will be redirected to index.php
    alert("<?php echo  $_SESSION['FIRST_NAME']. ' '.$_SESSION['LAST_NAME'] ; ?> Welcome!");
    window.location = "welcome.php";
</script>
<?php
  }   
    elseif($_SESSION ['TYPE'] == 'user' ){
      $query = "SELECT * FROM branch WHERE branch_id = '$_SESSION[BRANCH]'";
      $result = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result);        
    $_SESSION['B_NAME']  =  $row['branch_name'];
      
        ?>
        <script>
            alert("Welcome <?=$_SESSION['FIRST_NAME'] ." ".$_SESSION['LAST_NAME']?> ");
            window.location = "sales.php";
        </script>
        <?php
    }
      
    }
    else {
        ?>
        <script type="text/javascript">
        alert("Username or Password Not Registered! Contact Your administrator.");
        window.location = "login.php";
        </script>
      <?php
    }
    }
    ?>