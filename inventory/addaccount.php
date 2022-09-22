<?php
include 'connection.php';
include'sidebar.php';
$sqlforjob = "SELECT 	Employe_Id , fname, lname , JOB_TITLE ,job.JOB_ID FROM employee, job WHERE employee.JOB_ID = job.JOB_ID order by 	Employe_Id  asc";
$result = mysqli_query($con, $sqlforjob) or die ( mysqli_error($con));

$emp  = "<select name='employee' id='employee'class= 'form-control' required>
        <option value ='' disabled selected hidden>select employee</option>";
        
  while ($row = mysqli_fetch_assoc($result)) {
    $emp .= "<option value='".$row['Employe_Id']."'>".$row['fname'] ."&nbsp".$row['lname']."&nbsp-&nbsp".$row['JOB_TITLE']."</option> ";
    
  }
    $emp.= "</select>";
  
?>
<div id="content">
    <div class="container">
        <div class="card shadow">
            <form method = "POST">
            <div class="card-header bg-primary text-white">
                <h3>Add Account</h3>
                </div >
                <div class="card-body">
                    <div class="form-group">
                        <label for="employee">Employee</label>
                        <?=$emp?>
                    </div>
                    <div class="form-group">
                        <label for ="username">Username</label>
                        <input type = "text"id="username" class="form-control" name ="username"  required>
                    </div>
                    <div class="form-group">
                        <label for ="password">Password</label>
                        <input type = "password" id="password" class="form-control"name ="password"  required>
                </div>
</div>
                    <div class="card-footer text-right">
                        <button type ="submit" name ="submit" class="btn btn-primary" >submit</button>
                        <a href = "account.php"class="btn btn-secondary" >cancel</a>
                    </div>
        </div>
        
    </form>
</div>
</div>

<?php
if(isset($_POST['submit'])){
    $emp = $_POST['employee'];
    $user =  $_POST['username'];
    $pwd = sha1($_POST['password']);

    $query = "INSERT INTO login(Employe_Id,username,password,TYPE_ID) VALUES('$emp','$user','$pwd','2')";
    $result = mysqli_query($con,$query) ;
      if(!$result){
          $error =mysqli_error($con);
          echo $error;
      ?>
        <script>
        alert( `<?php  echo $error?>`);
            window.location="account.php";
        </script>
    <?php
      }
else{
?>
    <script>
        alert("Successfully added a account");
        window.location = "account.php";
    </script>
    <?php
}

}

?>