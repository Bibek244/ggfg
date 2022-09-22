<?php
    include 'connection.php';
    include'sidebar.php';
?>
<?php
if($_GET['action'] == "edit"){
$query = "SELECT fname, lname, gender, email, phone, JOB_TITLE, Hired_date, branch_id, address, TYPE 
FROM login l
JOIN employee e ON e.Employe_Id =  l.Employe_Id
JOIN type t ON t.TYPE_ID = l.TYPE_ID
JOIN job j ON j.JOB_ID = e.JOB_ID 
WHERE id = ".$_GET['id'];
$result = mysqli_query($con,$query);
while ($row = mysqli_fetch_assoc($result)){
$fn = $row['fname'];
$ln = $row['lname'];
$ge = $row['gender'];
$em = $row['email'];
$hd = $row['Hired_date'];
$ad = $row['address'];
$jt = $row['JOB_TITLE'];
$ty = $row['TYPE'];
$b_id  = $row['branch_id'];
}
$id = $_GET['id'];
?>
<div id="content">
    <div class="container">
        <div class="card shadow">
            <div class="card-head text-primary text-center">
                <h3><?php echo $fn ." ";?> <?php echo $ln;?>'s Details</h3>
            </div>
            <a href = "account.php" class= "btn btn-primary"> Go back</a>
            <div class="card-body">
                <?php
            if($jt !="Manager"){
                    $query = "SELECT * FROM branch WHERE branch_id = '$b_id'";
                    $result = mysqli_query($con,$query);
                    $row = mysqli_fetch_array($result);

                    ?>
                 
                    <h5> Branch : <?=$row['branch_name']?></h5>
                    <?php
                }?>
                <h5> Full name : <?php echo $fn ." ";?> <?php echo $ln;?></h5>
                <h5> Gender : <?php echo $ge ;?></h5>
                <h5>Email : <?php echo $em ;?></h5>
                <h5>Job title: <?php echo $jt ;?></h5>
                <h5> Hired date : <?php echo $hd ;?></h5>
                <h5>Role : <?php echo $jt?></h5>
                <h5> Address : <?php echo $ad?></h5>
                <h5>Account Type : <?php echo $ty?></h5>
            </div>
        </div>
    </div>
</div>
<?php 
}
if ($_GET['action'] == "delete"){
    $query ="DELETE FROM login WHERE id = ".$_GET['id'];
    $result = mysqli_query($con,$query);
    if(!$result){
        ?>
        <script>
            alert("failed to delete account");
            window.location ="account.php";
            </script>
            <?php
     }
            else{
                ?>
                <script>
                alert("Succesfully deleted account");
                window.location ="account.php";
                </script>
                <?php
            }
    }